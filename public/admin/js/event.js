const tabItems = document.querySelectorAll('.tab-item');
const tabContentItems = document.querySelectorAll('.tab-content-item');

// Select tab content item
function selectItem(e) {
    // Remove all show and border classes
    removeBorder();
    removeShow();
    // Add border to current tab item
    this.classList.add('tab-background');
    this.classList.add('tab-background-result');
    // Grab content item from DOM
    const tabContentItem = document.querySelector(`#${this.id}-content`);
    // Add show class
    tabContentItem.classList.add('show');
}

// Remove bottom borders from all tab items
function removeBorder() {
    tabItems.forEach(item => {
        item.classList.remove('tab-background');
        item.classList.remove('tab-background-result');
    });
}

// Remove show class from all content items
function removeShow() {
    tabContentItems.forEach(item => {
        item.classList.remove('show');
    });
}

// Listen for tab item click
tabItems.forEach(item => {
    item.addEventListener('click', selectItem);
});


/* my jQuery */

$(document).ready(function(){

    var typeaheadData = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
        "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh",
        "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia",
        "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma",
        "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad",
        "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the",
        "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti",
        "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
        "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon",
        "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea",
        "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India",
        "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
        "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos",
        "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
        "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
        "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco",
        "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger",
        "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru",
        "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino",
        "Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone",
        "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain",
        "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan",
        "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
        "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
        "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];

    $('#round-way-travel-from-input').typeahead({
        source: typeaheadData
    });

    $('#round-way-travel-desti-input').typeahead({
        source: typeaheadData
    });

    var dateToday = new Date();
    $("#round-way-travel-dep-date").datepicker({
        defaultDate: "+1w",
        dateFormat: "DD, d MM, yy",
        numberOfMonths: 2,
        duration: "fast",
        minDate: dateToday
    });

    $("#round-way-travel-return-date").datepicker({
        dateFormat: "DD, d MM, yy",
        numberOfMonths: 2,
        duration: "fast",
        minDate: dateToday
    });

    $("#round-way-travel-passenger-seat").click(function(){
        $("#round-way-travel-passenger-list").css('display', 'block');
        $("#round-way-travel-passenger-list-result").css('display', 'block');
    });

    $(".qty-box-remove").click(function(){
        $("#round-way-travel-passenger-list").css('display', 'none');
        $("#round-way-travel-passenger-list-result").css('display', 'none');
    });


    var minVal = 1;
    var maxVal = 100; // Set Max and Min values

    // Increase product quantity on cart page
    $(".increaseQty").on('click', function(){
        var $parentElm = $(this).parents(".qtySelector");
        $(this).addClass("clicked");
        setTimeout(function(){
            $(".clicked").removeClass("clicked");
        },100);
        var value = $parentElm.find(".qtyValue").val();
        if (value < maxVal) {
            value++;
        }
        $parentElm.find(".qtyValue").val(value);
    });

    // Decrease product quantity on cart page
    $(".decreaseQty").on('click', function(){
        var $parentElm = $(this).parents(".qtySelector");
        $(this).addClass("clicked");
        setTimeout(function(){
            $(".clicked").removeClass("clicked");
        },100);
        var value = $parentElm.find(".qtyValue").val();
        if (value > 1) {
            value--;
        }
        $parentElm.find(".qtyValue").val(value);
    });


    $('#one-way-travel-from-input').typeahead({
        source: typeaheadData
    });

    $('#one-way-travel-desti-input').typeahead({
        source: typeaheadData
    });


    $("#one-way-travel-dep-date").datepicker({
        defaultDate: "+1w",
        dateFormat: "DD, d MM, yy",
        numberOfMonths: 2,
        duration: "fast",
        minDate: dateToday
    });


    $("#one-way-travel-passenger-seat").click(function(){
        $("#one-way-travel-passenger-list").css('display', 'block');
        $("#one-way-travel-passenger-list-result").css('display', 'block');
    });

    $(".qty-box-remove").click(function(){
        $("#one-way-travel-passenger-list").css('display', 'none');
        $("#one-way-travel-passenger-list-result").css('display', 'none');
    });


    $('.multi-city-travel-from-input').typeahead({
        source: typeaheadData
    });

    $('.multi-city-travel-desti-input').typeahead({
        source: typeaheadData
    });


    $(".multi-city-travel-dep-date").datepicker({
        defaultDate: "+1w",
        dateFormat: "DD, d MM, yy",
        numberOfMonths: 2,
        duration: "fast",
        minDate: dateToday
    });


    $("#multi-city-travel-passenger-seat").click(function(){
        $("#multi-city-travel-passenger-list").css('display', 'block');
    });

    $(".qty-box-remove").click(function(){
        $("#multi-city-travel-passenger-list").css('display', 'none');
    });


    $('#multi-city-add').click(function(){
        var markup = $('.multiple-city-form:eq(0)').clone();
        markup.append('<span class="multiple-city-delete" />');
        $('.clone-multiple-city-form').append(markup);
    });
    $('#multi-city-add-result').click(function(){
        var markup = $('.multiple-city-form-result:eq(0)').clone();
        markup.append('<span class="multiple-city-delete" />');
        $('.clone-multiple-city-form').append(markup);
    });


    $(document).on('click', '.multiple-city-delete', function () {
        $(this).parents('.multiple-city-form').remove();
        return false;
    });


    if($(window).width() <= 420){
        $("#round-way-travel-dep-date").datepicker({
            defaultDate: "+1w",
            dateFormat: "DD, d MM, yy",
            numberOfMonths: 1,
            duration: "fast",
            minDate: dateToday
        });

        $("#round-way-travel-return-date").datepicker({
            dateFormat: "DD, d MM, yy",
            numberOfMonths: 1,
            duration: "fast",
            minDate: dateToday
        });
    }


    $('#res-menu').click(function(){
        $('#menu').toggle();
    });


    $('.slide-detail').click(function () {
        $(this).parents('.search-detail-link').siblings('.flight-details').toggle();
        $(this).find('i').toggleClass("fas fa-chevron-up fas fa-chevron-down");
        return false;
    });

    $(document).on('click', '.fd-tabs', function () {
        $(this).addClass('mytabActive');
        $(this).parents('li').siblings('li').find('.fd-tabs').removeClass('mytabActive');
    });

    $('.bii').mouseenter(function () {
        $(this).siblings('.booking-info-data').css('display', 'block');
        return false;
    });
    $('.bii').mouseleave(function () {
        $(this).siblings('.booking-info-data').css('display', 'none');
        return false;
    });

    //$('#ps1-exp-date').datepicker();
    //$('#ps2-exp-date').datepicker();

});