// PRE LOADER JS

setTimeout(function () {
    $('#ctn-preloader').addClass('loaded');
    // Una vez haya terminado el preloader aparezca el scroll
    $('body').removeClass('no-scroll-y');

    if ($('#ctn-preloader').hasClass('loaded')) {
        // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
        $('#preloader').delay(1000).queue(function () {
            $(this).remove();
        });
    }
}, 600);

$('.banner-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})

$('.testimonial-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})

$('.product-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})

$(document).ready(function () {
    $('.js-example-basic-single').select2();
});

$('#new-password, #confirm-new-password').on('keyup', function () {
    if ($('#new-password').val() == '' || $('#new-password').val() == null) {
        $('#message').html('').css('color', 'green');
        $("#password").prop('disabled', true);

        return;
    }
    if ($('#new-password').val() == $('#confirm-new-password').val()) {
        $(".password").removeClass("common");

        $("#password").prop('disabled', false);
        $('#message').html('Matching').css('color', 'green');


    } else {
        $(".password").addClass("common");

        $('#message').html('Not Matching').css('color', 'red');
        $("#password").prop('disabled', true);

        // $('.submit-button').prop('disabled', true);
    }
});
$(document).ready(function () {
    // Attach a click event to the Search button
    $("#searchButton").on("click", function (e) {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Get selected values from the dropdowns
        var modelId = $("#model").val();
        var state = $("#state").val();
        var cat = $("#cat").val();
        var subCat = $("#sub-cat").val();
        var maker = $(".maker_change_st").val();

        var x = '/view/part?';


        if (modelId != null) {
            var x = x + 'model=' + modelId;
        }
        if (state != null) {
            var x = x + '&state=' + state;
        }
        if (cat != null) {
            var x = x + '&cat=' + cat;
        }
         if (subCat != null) {
            var x = x + '&subCat=' + subCat;
        }
        if (maker != null) {
            var x = x + '&maker_id=' + maker;
        }

        window.location.href = x;

    });
    $(".searchButton2").on("click", function (e) {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Get selected values from the dropdowns
        var vehicle_type = $(".vehicle_type").val();
        var statechange = $(".statechange").val();
        var manufacturer = $(".manufacturer").val();
        var maker = $(".maker_change_st").val();
        var price = $(".price").val();
        var x = '/view/part?';

        if (vehicle_type != null) {
            var x = x + 'vehicle_type=' + vehicle_type;
        }
        if (statechange != null) {
            var x = x + '&state=' + statechange;
        }

        if (price != null) {
            var x = x + '&price=' + price;
        }
        if (manufacturer != null) {
            var x = x + '&manufacturer=' + manufacturer;
        }
        window.location.href = x;

    });
});

$(document).ready(function () {
    $('.maker_change').change(function () {
        var parentId = $(this).val();

        if (parentId) {
            $.ajax({
                type: 'GET',
                url: '/get-model-options/' + parentId,
                success: function (data) {
                    // Clear existing child options
                    $('.mode_change').empty();

                    // Append new child options
                    $.each(data, function (id, name) {
                        $('.mode_change').append(new Option(name, id));
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If no parent selected, clear child options
            $('.mode_change').empty();
        }
    });
});

$(document).ready(function () {
    $('.mode_change').click(function () {
        var parentId = $(this).val();

        if (parentId) {
            $.ajax({
                type: 'GET',
                url: '/get-state-options/' + parentId,
                success: function (data) {
                    // Clear existing child options
                    $('.st_change').empty();

                    // Append new child options
                    $.each(data, function (index, area) {
                        $('.st_change').append(new Option(area, area));
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If no parent selected, clear child options
            $('.st_change').empty();
        }
    });
});


$(document).ready(function () {
    $('.maker_change_st').click(function () {
        var parentId = $(this).val();

        if (parentId) {
            $.ajax({
                type: 'GET',
                url: '/get-state-options-mk/' + parentId,
                success: function (data) {
                    // Clear existing child options
                    $('.st_change').empty();

                    // Append new child options
                    $.each(data, function (index, area) {
                        $('.st_change').append(new Option(area, area));
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If no parent selected, clear child options
            $('.st_change').empty();
        }
    });
});

$(document).on("click", "#ic", function () {

    st = $(this).attr('data-status');
    ct = $(this).attr('data-ct');
    if (st == 0) {
        $(this).attr('src', '/assets/img/heartfill.png');
        st = $(this).attr('data-status', 1);
        $.ajax({
            type: 'GET',
            url: '/add-to-fav/' + ct,
            success: function (data) {
                if (!data['status']) {
                    location.href = '/user/login';
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    } else {
        $(this).attr('src', '/assets/img/heart.png');
        st = $(this).attr('data-status', 0);

        $.ajax({
            type: 'GET',
            url: '/rem-to-fav/' + ct,
            success: function (data) {

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

});
$("#searchbox").keyup(function () {
    q = $(this).val();
    $.ajax({
        type: 'GET',
        url: '/search-for-pro',
        data: { q: q },
        success: function (response) {
            if (response != '' && response != null) {
                $("#search-results").removeClass('d-none');

                var resultsHtml = "";
                $.each(response, function (index, result) {
                    resultsHtml += "<li><a href='/view/detail/"+result.id +"'>" + result.name + "<a/></li>"; // Adjust as needed
                });
                $("#search-results").html(resultsHtml);
            } else {
                var resultsHtml = "";
                $("#search-results").addClass('d-none');
                $("#search-results").html(resultsHtml);

            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    })
})
$(document).ready(function () {
    $('.categroy_dropdown').change(function () {
        var parentId = $(this).val();

        if (parentId) {
            $.ajax({
                type: 'GET',
                url: '/get-SubCat-options/' + parentId,
                success: function (data) {
                    // Clear existing child options
                    $('.subCatDropDown').empty();

                    // Append new child options
                    $.each(data, function (id, name) {
                        $('.subCatDropDown').append(new Option(name, id));
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If no parent selected, clear child options
            $('.subCatDropDown').empty();
        }
    });
});
$(document).ready(function () {
    // Show/hide categories when the "Shop Now" button is clicked
    $('#showMoreButton').click(function () {
        $('.my-3.d-none').slice(0, 4).removeClass('d-none');
        $(this).hide(); // Hide the button after all categories are shown
    });
});
$('.img-slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})


