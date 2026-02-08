
let isFormDirty = false; // To check if any update has been made to DB

// Inittialize CkEditor
ClassicEditor.create(document.querySelector("textarea[name='description']"));

// start Draft init after Title is added and moved to next textbox.
let draftInitCalled = false;

function debounce(func, delay) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

const sendDraftInit = debounce(function () {
    const title = $('#title').val().trim();
    if (!draftInitCalled && title !== '') {
        draftInitCalled = true;
        axios.post(`${APP_URL}admin/product/draft/init`, {
            product_uid: $('#product_uid').val(),
            title: title
        }).then(res => {
            isFormDirty = true;
            $('#submit-product').removeAttr('disabled');
        }).catch(err => {
            console.error("Draft init failed", err);
        });
    }
}, 500);

$('#title').on('keyup', sendDraftInit);


// Generate SLug on based of Title
function generateSlug(e, slug_textfeild_id) {
    const title = $(e).val();
    var slug = title
        .toString()
        .toLowerCase()
        .trim()
        .replace(/[\s\W-]+/g, '-')  // Replace spaces and non-word chars with -
        .replace(/^-+|-+$/g, '');   // Trim starting/trailing dashes

    $(`#${slug_textfeild_id}`).val(slug);
}


// Custom Drop-Zone Logic
const dzTrigger = document.querySelector(".dropzone");
const previewContainer = document.querySelector("#dropzone-preview");
const template = document.querySelector("#dropzone-preview-list");
const templateHTML = template.innerHTML;
template.remove();

const fileInput = document.createElement("input");
fileInput.type = "file";
fileInput.accept = "image/*";
fileInput.multiple = true;
fileInput.classList.add("d-none");

dzTrigger.appendChild(fileInput);

// Axios config
const uploadUrl = `${APP_URL}admin/product/draft/gallery/add`;      // Backend route for storing temp file
const deleteUrl = `${APP_URL}admin/product/draft/gallery/delete`;      // Backend route for deleting temp file

const uploadedFiles = [];

dzTrigger.addEventListener("click", () => fileInput.click());

fileInput.addEventListener("change", function () {
    const files = [...fileInput.files];

    files.forEach((file) => {
        const formData = new FormData();
        var product_uid = $('#product_uid').val();
        if(product_uid == ''){
            show_toast('error', 'Enter Title first for the product!')
            return false;
        }
        formData.append("file", file);
        formData.append("product_uid", product_uid);

        // Upload to backend
        axios.post(uploadUrl, formData, {
            headers: { "Content-Type": "multipart/form-data" }
        })
        .then(res => {

            isFormDirty = true;
            const { filename, url, uniquefilname, image_id } = res.data;

            const li = document.createElement("li");
            li.className = "mt-2";
            li.innerHTML = templateHTML;

            li.querySelector("img").src = url;
            li.querySelector("[data-dz-name]").textContent = filename;
            li.querySelector("[data-dz-size]").textContent = (file.size / 1024).toFixed(1) + " KB";

            const removeBtn = li.querySelector("[data-dz-remove]");
            removeBtn.value = uniquefilname
            removeBtn.addEventListener("click", function (e) {
                e.preventDefault();
                axios.post(deleteUrl, { 'product_uid': product_uid, 'image_id' : image_id }).then(() => {
                    li.remove();
                });
            });

            previewContainer.appendChild(li);

            uploadedFiles.push({ product_uid, filename, url });
        })
        .catch(err => {
            alert("Upload failed");
            console.error(err);
        });
    });

    fileInput.value = ''; // reset input
});

// Before Reload show alert
window.addEventListener("keydown", function (e) {
    const isReloadKey =
        e.key === "F5" ||
        (e.ctrlKey && e.key.toLowerCase() === "r") ||
        (e.metaKey && e.key.toLowerCase() === "r"); // for macOS

    if (isReloadKey && isFormDirty) {
        e.preventDefault();
        alert("Product saved in Draft. You can edit it anytime from the Manage page.");
    }
});



