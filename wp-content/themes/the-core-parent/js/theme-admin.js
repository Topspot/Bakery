jQuery(window).load(function($) {
    "use strict";

    setTimeout(function(){
        // hide search type on window load
        var search_position = jQuery('#fw-backend-option-fw-option-header_settings-enable_search-yes-search_position');
        var src = jQuery('#fw-option-header_settings-header_type_picker-header_type .thumbnail.selected img').attr('src');
        if(search_position.length > 0){
            fw_hide_search_position(search_position, src);
        }
    }, 500);
});

jQuery(document).ready(function($) {
    "use strict";

    if ( typeof fwEvents !== 'undefined') {
        // advanced styling button
        fwEvents.on('fw:options:init', function (data) {
            // for table (on change table type)
            var table_type = jQuery('#fw-edit-options-modal-table-header-optionstable_purpose');
            if (table_type.length > 0) {
                fw_hide_table_styling_options(table_type.val());
                table_type.on('change', function () {
                    fw_hide_table_styling_options(table_type.val());
                });
            }

            // for calendar (on change calendar type)
            var calendar_type = jQuery('.calendar-styling#fw-edit-options-modal-template');
            if (calendar_type.length > 0) {
                fw_hide_calendar_styling_options(calendar_type.val());
                calendar_type.on('change', function () {
                    fw_hide_calendar_styling_options(calendar_type.val());
                });
            }

            // for testimonials style
            var testimonials_type = jQuery('.fw-testimonials-type');
            if (testimonials_type.length > 0) {
                var src = testimonials_type.find('.thumbnail.selected img').attr('src');
                fw_hide_testimonials_advanced_options(src);
                testimonials_type.on('change', function () {
                    var src = testimonials_type.find('.thumbnail.selected img').attr('src');
                    fw_hide_testimonials_advanced_options(src);
                });
            }

            // hide options for button style 4
            fw_hide_button_options();
            jQuery('.fw-button-style-type select').on('change', function(){
                fw_hide_button_options();
            });

            // for advanced button styling
            data.$elements.find('.fw-option-type-popup[data-advanced-for]:not(.advanced-initialized)').each(function () {
                var $optionWithAdvanced = data.$elements.find('.' + $(this).attr('data-advanced-for'));
                var $buttonLabel = $(this).find('.button').html();

                if (!$optionWithAdvanced.length) {
                    console.warn('Option with advanced not found', $(this).attr('data-advanced-for'));
                    return;
                }

                var $advancedButton = $('<button type="button" class="button fw-advanced-button">' + $buttonLabel + '</button>'),
                    $popupButton = $(this).find('.button:first');

                $advancedButton.on('click', function () {
                    $popupButton.trigger('click');
                });

                $advancedButton.insertAfter(
                    $optionWithAdvanced.closest('.fw-backend-option-input').find('> .fw-inner')
                );

                $popupButton.closest('.fw-backend-option').addClass('fw-hidden');
            }).addClass('advanced-initialized');
        });
        // end advanced styling button
    }

    // color-palette on change a color
    jQuery('body').on('change', '#fw-option-color_settings #fw-option-color_settings-color_1', function(){
        jQuery('#fw-option-color-palette-predefined .fw-palette-color-1 .fw-palette-inner').css('background-color', jQuery(this).val());
    });
    jQuery('body').on('change', '#fw-option-color_settings #fw-option-color_settings-color_2', function(){
        jQuery('#fw-option-color-palette-predefined .fw-palette-color-2 .fw-palette-inner').css('background-color', jQuery(this).val());
    });
    jQuery('body').on('change', '#fw-option-color_settings #fw-option-color_settings-color_3', function(){
        jQuery('#fw-option-color-palette-predefined .fw-palette-color-3 .fw-palette-inner').css('background-color', jQuery(this).val());
    });
    jQuery('body').on('change', '#fw-option-color_settings #fw-option-color_settings-color_4', function(){
        jQuery('#fw-option-color-palette-predefined .fw-palette-color-4 .fw-palette-inner').css('background-color', jQuery(this).val());
    });
    jQuery('body').on('change', '#fw-option-color_settings #fw-option-color_settings-color_5', function(){
        jQuery('#fw-option-color-palette-predefined .fw-palette-color-5 .fw-palette-inner').css('background-color', jQuery(this).val());
    });

    // hide post tabs
    fw_show_hide_post_tabs();

    var page_header = jQuery('#fw-options-box-page-side');
    var page_template = jQuery('#page_template');

    // if on page ready template is without sidebar hide header image option
    if(page_template.val()=='visual-builder-template.php'){
        page_header.hide();
    }
    else{
        page_header.show();
    }

    // on click visual page editor button set page template "visual page"
    jQuery('#wp-content-media-buttons').on('click', '.button-primary', function(){
        if( page_template.val() == 'blank-template.php' ){
            page_template.val('blank-template.php');
        }
        else {
            page_template.val('visual-builder-template.php');
        }
        page_header.hide();
    });

    // on click default editor button set page template "default template"
    jQuery('#post-body').on('click', '.page-builder-hide-button', function(){
        page_template.val('default');
        page_header.show();
    });

    // on change page template hide header image option
    page_template.on('change', function(){
        if( page_template.val() == 'default' ){
            jQuery('.page-builder-hide-button').trigger('click');
            page_header.show();
        }
        else if( page_template.val() == 'blank-template.php' ){
            jQuery('#wp-content-media-buttons .button-primary').trigger('click');
            page_header.hide();
        }
        else{
            jQuery('#wp-content-media-buttons .button-primary').trigger('click');
            page_header.hide();
        }
    });

    // hide search position for specific header type
    var search_position = jQuery('#fw-backend-option-fw-option-header_settings-enable_search-yes-search_position');
    jQuery('#fw-option-header_settings-header_type_picker-header_type').on('click', '.thumbnail', function(){
        var src = jQuery(this).find('img').attr('src');
        fw_hide_search_position(search_position, src);
    });
    // hide search position on click on header tab
    jQuery('#fw_form_fw_settings').on('click', 'li[aria-controls="fw-options-tab-header"]', function(){
        var src = jQuery('#fw-option-header_settings-header_type_picker-header_type .thumbnail.selected img').attr('src');
        fw_hide_search_position(search_position, src);
    });
});

function fw_hide_search_position(search_position, src){
    "use strict";

    if(src.indexOf("header-type2") > -1){
        search_position.hide();
    }
    else{
        search_position.show();
    }
}

function fw_show_hide_post_tabs(){
    "use strict";

    var post_format = jQuery('#post-formats-select .post-format:checked').val();
    if(post_format == undefined) {
        return;
    }
    var tabs_number = jQuery(".fw-options-tabs-wrapper .fw-options-tabs-list ul li").length;
    if ( typeof tabs == 'function' ) {
        var selected_tab = jQuery(".fw-options-tabs-wrapper").tabs().tabs("option", "active");
    }
    else {
        var selected_tab = 1;
    }

    if (tabs_number == 1)
    {
        if (post_format !== '0') {
            jQuery('#fw-options-box-main').hide();
        }
        else {
            jQuery('#fw-options-box-main').show();
        }
    }
    else {
        if (post_format !== '0') {
            jQuery('.fw-options-tabs-list').find('li').each(function () {
                if (jQuery(this).attr('aria-controls') === 'fw-options-tab-media') {
                    jQuery(this).hide();
                    jQuery(".fw-options-tabs-wrapper").tabs("option", "active", selected_tab + 1);
                }
            });
        }
        else {
            // show tab
            jQuery('.fw-options-tabs-list').find('li').each(function () {
                if (jQuery(this).attr('aria-controls') === 'fw-options-tab-media') {
                    jQuery(this).show();
                    jQuery(".fw-options-tabs-wrapper").tabs("option", "active", 0);
                }
            });
        }
    }


    // hide media tab if post format not standart
    jQuery('#post-formats-select .post-format').on('click',function(){
        var clicked_post_format = jQuery(this).val();

        if (tabs_number == 1) {
            if (clicked_post_format !== '0') {
                jQuery('#fw-options-box-main').hide();
            }
            else {
                jQuery('#fw-options-box-main').show();
            }
        }
        else
        {
            var selected = jQuery(".fw-options-tabs-wrapper").tabs("option", "active");

            // if no standart post format
            if (clicked_post_format !== '0') {
                // hide tab
                jQuery('.fw-options-tabs-list').find('li').each(function () {
                    if (jQuery(this).attr('aria-controls') === 'fw-options-tab-media') {
                        jQuery(this).hide();
                        jQuery(".fw-options-tabs-wrapper").tabs("option", "active", selected + 1);
                    }
                });
            }
            else {
                // show tab
                jQuery('.fw-options-tabs-list').find('li').each(function () {
                    if (jQuery(this).attr('aria-controls') === 'fw-options-tab-media') {
                        jQuery(this).show();
                        jQuery(".fw-options-tabs-wrapper").tabs("option", "active", 0);
                    }
                });
            }
        }
    });
}

function fw_hide_table_styling_options(select_value){
    "use strict";

    var princing_options = jQuery('#fw-backend-option-fw-edit-options-modal-table_advanced_styling');
    var tabular_options = jQuery('#fw-backend-option-fw-edit-options-modal-tabular_table_advanced_styling');
    if(select_value == 'pricing'){
        princing_options.show();
        tabular_options.hide();
    }
    else{
        princing_options.hide();
        tabular_options.show();
    }
}

function fw_hide_calendar_styling_options(select_value){
    "use strict";

    var month_styling = jQuery('#fw-backend-option-fw-edit-options-modal-advanced_styling');
    var week_styling  = jQuery('#fw-backend-option-fw-edit-options-modal-advanced_week_styling');
    var day_styling   = jQuery('#fw-backend-option-fw-edit-options-modal-advanced_day_styling');

    if(select_value == 'day'){
        month_styling.hide();
        week_styling.hide();
        day_styling.show();
    }
    else if(select_value == 'week'){
        month_styling.hide();
        week_styling.show();
        day_styling.hide();
    }
    else{
        month_styling.show();
        week_styling.hide();
        day_styling.hide();
    }
}

function fw_hide_button_options(){
    "use strict";

    var button_type = jQuery('.fw-button-style-type .image_picker_selector .thumbnail.selected img');
    if( button_type.length > 0 ) {
        var button_color_group = jQuery('.fw-button-color-group');
        var src = button_type.attr('src');
        if(src.indexOf("button-style4") > -1){
            button_color_group.hide();
        }
        else{
            button_color_group.show();
        }
    }
}

function fw_hide_testimonials_advanced_options(src){
    "use strict";

    var bg_group = jQuery('.fw-testimonials-bg-group');
    var padding_group = jQuery('.fw-testimonials-padding-group');
    if(src.indexOf("testimonials-style2") > -1){
        bg_group.show();
        padding_group.show();
    }
    else{
        bg_group.hide();
        padding_group.hide();
    }
}
