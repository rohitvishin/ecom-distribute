// Axios call to get product data from Laravel
initializedCategoryDatatable();

function initializedCategoryDatatable(){
    $('#elmLoader').removeClass('d-none');
    axios.get(get_all_category_url)
    .then(response => {

        // If already initialized, destroy and reinit
        if ($.fn.DataTable.isDataTable('#manage_data')) {
            $('#manage_data').DataTable().clear().destroy();
        }
        
        const categories = response.data.data; // adjust if your JSON format differs

        new DataTable("#manage_data", {
            data: categories,
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1,
                    title: "Sr No"
                },
                {   data: 'name', title: "Category Name", 
                    render: function(data, type, row){
                        var status = row.status == 'active' ? '<span class="badge bg-success-subtle text-success">Active</span>' : '<span class="badge bg-danger-subtle text-danger">Deactive</span>'; 
                        return `${row.name}<br>${status}`;
                    }
                },
                { data: 'parent_name', title: "Parent Name" },
                {
                    data: null,
                    title: "Actions",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var statusAttr = row.status == 'active' ? 'checked' : '';
                        // Encode the row object as JSON and escape it
                        const rowData = encodeURIComponent(JSON.stringify(row));

                        return `
                            <div class="d-flex justify-content-around gap-3">
                            <button class="btn btn-sm btn-primary edit-category-btn" data-category_uid="${row.category_uid}" data-name="${row.name}" data-slug="${row.slug}" data-description="${row.description}" data-image_url="${row.image_url}" data-parent_uid="${row.parent_uid}">Edit</button>
                            <div class="form-check form-switch form-switch-md"><input class="form-check-input category-status-update-checkbox" type="checkbox" role="switch" id="flexSwitchCheckChecked-${row.category_uid}" ${statusAttr} data-parent-id="${row.parent_uid}" data-category-id="${row.category_uid}"><label class="form-check-label" for="flexSwitchCheckChecked-${row.category_uid}"></label></div>
                            </div>
                        `;
                    }
                }
            ],
            responsive: true
        });
        $('#elmLoader').addClass('d-none');
    })
    .catch(error => {
        console.error('Failed to load product data:', error);
    });
}

function closeModal(id){
    $(`#${id}`).modal('hide');
}

document.getElementById("create-category-form").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = document.getElementById("create-category-form");
    const formData = new FormData(form);
    const storeUrl = form.dataset.storeUrl;

    const submitBtn = document.getElementById("addNewCatgeory");
    submitBtn.disabled = true;
    submitBtn.innerText = "Saving...";

    axios.post(storeUrl, formData)
        .then(res => {
            if (res.data.status) {
                show_toast('success', res.data.message);
                closeModal();
                initializedCategoryDatatable();
                form.reset();
                document.getElementById("task-error-msg").innerText = '';
                document.getElementById("task-error-msg").style.display = 'none';
            } else {
                show_toast('error', 'Something went wrong!');
            }
        })
        .catch(err => {
            const msg = err.response?.data?.message || 'Validation failed.';
            document.getElementById("task-error-msg").innerText = msg;
            document.getElementById("task-error-msg").style.display = 'block';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerText = "Add Category";
        });
});

document.getElementById("edit-category-form").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = document.getElementById("edit-category-form");
    const formData = new FormData(form);
    formData.append('category_uid', $('#editCategory').val());
    const updateUrl = form.dataset.updateUrl;

    const submitBtn = document.getElementById("editCatgeory");
    submitBtn.disabled = true;
    submitBtn.innerText = "Saving...";

    axios.post(updateUrl, formData)
        .then(res => {
            if (res.data.status) {
                show_toast('success', res.data.message);
                closeModal('editCategory');
                initializedCategoryDatatable();
                form.reset();
                document.getElementById("edit-task-error-msg").innerText = '';
                document.getElementById("edit-task-error-msg").style.display = 'none';
            } else {
                show_toast('error', 'Something went wrong!');
            }
        })
        .catch(err => {
            const msg = err.response?.data?.message || 'Validation failed.';
            document.getElementById("edit-task-error-msg").innerText = msg;
            document.getElementById("edit-task-error-msg").style.display = 'block';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerText = "Edit Category";
        });
});

$(document).on('change', '.category-status-update-checkbox', function () {
    $('#elmLoader').removeClass('d-none');
    const categoryId = $(this).attr('data-category-id');
    const parentId = $(this).attr('data-parent-id');
    const newStatus = $(this).is(':checked') ? 'active' : 'inactive';

    if(newStatus == 'inactive'){
        const confirmResult = confirm('This will deactivate all products as well in this category');
        if (!confirmResult) {
            // Revert checkbox state
            $(this).prop('checked', ($(this).is(':checked') ? false : true)); // If they unchecked, recheck it
            $('#elmLoader').addClass('d-none');
            return;
        }
    }
    
    var formData = new FormData();
    formData.append('category_uid', categoryId);
    formData.append('parent_uid',parentId);
    formData.append('status', newStatus);
    axios.post(`${APP_URL}admin/category/update-category-status`, formData).then(function(response) {
        $('#elmLoader').addClass('d-none');
        show_toast(response.data.type, response.data.message)
        if (response.data.type == 'success') {
            initializedCategoryDatatable();
        }
    }).catch(function(err) {
        show_toast('error', err)
    });
});

$(document).on('click', '.edit-category-btn', function () {
    // Now use rowData to fill modal inputs
    $('#edit-name').val($(this).attr('data-name'));
    $('#edit-slug').val($(this).attr('data-slug'));
    $('#edit-description').val($(this).attr('data-description'));
    $('#edit-parent_uid').val($(this).attr('data-parent_uid'));
    $('#editCategory').val($(this).attr('data-category_uid'));

    const edit_category_choice = window.choicesInstances['edit-parent_uid'];
    edit_category_choice.removeActiveItems();  // This clears the current selection

    // Set Parent Catgeory in Choice select
    if($(this).attr('data-parent_uid') != 'null'){
        edit_category_choice.setChoiceByValue($(this).attr('data-parent_uid'));
    }else{
        edit_category_choice.setChoiceByValue('');
    }

    // If you show image preview
    if($(this).attr('data-image_url') != 'null'){
        $('.image-preview').removeClass('d-none');
        $('#edit-image_preview').attr('src', ASSET_URL+$(this).attr('data-image_url'));
    }else{
        if($('.image-preview').hasClass('d-none')){
            $('.image-preview').addClass('d-none');
        }
    }

    // Show modal
    $('#editCategory').modal('show');
});

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