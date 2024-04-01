$(document).on('click', "#add_app", function(event) {
    event.preventDefault();

    // Find the closest parent with class "tile_container"
    const tileContainer = $(this).closest('.tile_container');

    if (tileContainer.length) {
        // Now that you have the closest tile container, you can retrieve specific information within it
        const firmName = tileContainer.find('.tile_firm_name').text();
        const linkName = tileContainer.find('.tile_link_name').text();
        const link = tileContainer.find('.tile_link_for_add_only').text();
        const location = tileContainer.find('.tile_location').text();
        const date = tileContainer.find('.tile_date').text();

        // You can then use this information for further processing
        console.log('Firm Name:', firmName);
        console.log('Link Name:', linkName);
        console.log('link:', link);
        console.log('Location:', location);
        console.log('Date:', date);
        
    var appinfo = {
        link: link,
        name: linkName,
        location: location,
        date: date,
        firm_name: firmName,
    };

    $.ajax({
        type: 'POST',
        url: 'ajax/applications/add_our_app.php',
        data: appinfo,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            alert("Application link and date saved to Applications!")
            UpdateYourAppTiles(data);
        }
    })
 
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
    }
})