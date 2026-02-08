$(document).ready(function() {
    // Function to load products by category
    function loadProductsByCategory(categoryId) {
        // Show loading state
        $('.product-container').children('.swiper-wrapper').append('<div class="loading-spinner">Loading products...</div>');

        $.ajax({
            url: `${url}/api/productList`,
            type: 'GET',
            data: { category_id: categoryId,page:1 },
            dataType: 'json',
            success: function(response) {
                if (response.status=='success' && response.data.products.data.length > 0) {
                    // Clear existing products and loading spinner
                    $('.product-container').children('.swiper-wrapper').empty();

                    // Append each product
                    $.each(response.data.products.data, function(index, product) {
                        const productHtml = `
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper asp-ratio-0">
                                        <a href="product-detail.html?id=${product.id}" class="product-img">
                                            <img class="img-product lazyload" data-src="${product.product_images[0].image_url}" src="${product.product_images[0].image_url}" alt="${product.title}">
                                            ${product.product_images[1] ? `<img class="img-hover lazyload" data-src="${product.product_images[1].image_url}" src="${product.product_images[1].image_url}" alt="${product.title}">` : ''}
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#quickAdd" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon" data-product-id="${product.id}">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Quick Add</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon quickview" data-product-id="${product.id}">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a href="#compare" data-bs-toggle="modal" aria-controls="compare" class="hover-tooltip tooltip-left box-icon" data-product-id="${product.id}">
                                                    <span class="icon icon-compare"></span>
                                                    <span class="tooltip">Add to Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                        ${product.discount > 0 ? `
                                        <div class="on-sale-wrap">
                                            <span class="on-sale-item">${product.discount}% Off</span>
                                        </div>
                                        ` : ''}
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html?id=${product.id}" class="name-product link fw-medium text-md">${product.title}</a>
                                        <p class="price-wrap fw-medium">
                                            <span class="price-new text-xl text-primary">₹${product.selling_price}</span>
                                            ${product.discount > 0 ? `<span class="price-old">₹${product.mrp}</span>` : ''}
                                        </p>
                                        ${product.variants && product.variants.length > 0 ? `
                                        <ul class="list-color-product style-2">
                                            ${product.variants.map((variant, i) => `
                                            <li class="list-color-item hover-tooltip tooltip-bot color-swatch ${i === 0 ? 'active' : ''}">
                                                <span class="tooltip color-filter">${variant.color}</span>
                                                <span class="swatch-value" style="background-color: ${variant.color_code}"></span>
                                                <img class="lazyload" data-src="${variant.image}" src="${variant.image}" alt="${product.title}">
                                            </li>
                                            `).join('')}
                                        </ul>
                                        ` : ''}
                                    </div>
                                </div>
                            </div>
                        `;
                        
                        $('.product-container').children('.swiper-wrapper').append(productHtml);
                    });
                    
                    // Initialize lazy loading for new images
                    if (typeof lazyload === 'function') {
                        lazyload();
                    }
                    
                    // Reinitialize Swiper if needed
                    if (typeof swiper !== 'undefined') {
                        swiper.update();
                    }
                    
                } else {
                    $('.product-container').children('.swiper-wrapper').html('<div class="col-12 text-center py-5"><p>No products found in this category</p></div>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading products:', error);
                $('.product-container').children('.swiper-wrapper').html('<div class="col-12 text-center py-5"><p>Error loading products. Please try again.</p></div>');
            },
            complete: function() {
                $('.loading-spinner').remove();
            }
        });
    }
    
    // Example usage - call this when category changes
    $('.category-filter').on('click', function() {
        const categoryId = $(this).data('category-id');
        loadProductsByCategory(categoryId);
    });
    
    // Initialize with default category
    loadProductsByCategory(1); // Replace with your default category ID
});