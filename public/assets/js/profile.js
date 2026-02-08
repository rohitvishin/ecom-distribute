$('#profile-img-file-input').on('change', function(){
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('.user-profile-image').attr('src', e.target.result);
            $('.update-logo-photo-btn').addClass('d-none');
            $('.update-logo-photo-btn').removeClass('d-none');
        }
        reader.readAsDataURL(file);
    }
});

$('#favicon-img-file-input').on('change', function(){
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#favicon-img-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
});

$('#cancel-logo-upload').on('click',function(){
    var default_logo = $(this).attr('data-default-logo');
    $('.user-profile-image').attr('src', default_logo);
    $('.update-logo-photo-btn').removeClass('d-none');
    $('.update-logo-photo-btn').addClass('d-none');
});

$('#upload-logo').on('click',function(e){
    e.preventDefault();
    const uploadLogoForm = $('#upload-logo-form')[0]; // Get the native DOM form element
    const formData = new FormData(uploadLogoForm);
    axios.post(`${APP_URL}admin/account/update_logo`,formData, {headers: {
        'Content-Type': 'multipart/form-data', 
    }}).then(function(response) {
        // handle success
        show_toast(response.data.type, response.data.message)
        if (response.data.type == 'success') {
            $('.profile-wid-img').attr('src', response.data.new_banner_url);
            $('.update-logo-photo-btn').removeClass('d-none');
            $('.update-logo-photo-btn').addClass('d-none');
            return true;
        } else {
            return false;
        }
    }).catch(function(err) {
        show_toast('error', err.response.data.message)
    });
});

$('#add_new_social_media_link').on('click', function(){
    var item_count = parseInt($(this).val()) + 1;
    
    if(item_count > 5){
        show_toast('error', 'Oops! only 5 Links are allowed!');
        return false;
    }
    var html = `<div id="social-media-link-${item_count}" class="mb-3 d-flex pt-1">
    <div class="input-group">
        <select class="form-control" name="social_media_links[${item_count}][type]">
            <option value="instagram">Instagram</option>
            <option value="facebook">Facebook</option>
            <option value="youtube">Youtube</option>
            <option value="tiktok">Tiktok</option>
            <option value="other">Other</option>
        </select>
        <input type="text" class="form-control" name="social_media_links[${item_count}][link]" aria-label="Social Media Links">
        <button class="btn btn-danger" type="button" onclick="deleteLink('${item_count}')"><i class="ri-delete-bin-fill"></i></button>
    </div></div>`; 
    $(this).val(item_count)
    $('#save_social_media_links').removeClass('d-none');
    $('#social_media_links_form').append(html);
});

function deleteLink(id){
    $(this).removeClass('ri-delete-bin-fill');
    $(this).addClass('spinner-grow spinner-grow-xs');
    var item_count = parseInt($('#add_new_social_media_link').val()) - 1;
    if(item_count == -1){
        $('#social-media-action-btn-div').addClass('d-none');
        $('#social-media-edit-btn-div').removeClass('d-none');
    }
    $('#add_new_social_media_link').val(item_count);
    $(`#social-media-link-${id}`).remove();
}

$('#social-media-edit-btn').on('click', function(){
    $('#social_media_links_form').removeClass('d-none');
    $('#social-media-action-btn-div').removeClass('d-none');

    $('#social-media-div').addClass('d-none');
    $('#social-media-edit-btn-div').addClass('d-none');
    if($('#social-media-edit-btn').val() == '-1'){
        $('#add_new_social_media_link').trigger('click');
    }
});

$('#save_social_media_links').on('click',function(e){
    e.preventDefault();
    const social_media_links_form = $('#social_media_links_form')[0]; // Get the native DOM form element
    const formData = new FormData(social_media_links_form);
    axios.post(`${APP_URL}admin/account/update-brand-social-media`, formData).then(function(response) {
        // handle success
        show_toast(response.data.type, response.data.message)

        if(response.data.type == 'success'){
            $('#social_media_links_form').addClass('d-none');
            $('#social-media-action-btn-div').addClass('d-none');

            $('#social-media-div').removeClass('d-none');
            $('#social-media-div').html(response.data.html);
            $('#social-media-edit-btn-div').removeClass('d-none');
        }

    }).catch(function(err) {
        show_toast('error', err.response.data.message)
    });
});