(function($) {
    $('.span-link').css('cursor', 'pointer');

    $('.span-link').on('mouseover', function() {
        $(this).css('text-decoration', 'underline');
    });

    $('.span-link').on('mouseout', function() {
        $(this).css('text-decoration', 'none');
    });

    $('.link-delete').on('click', function() {
        var url = $(this).attr('data-url');
        if(confirm("Are you sure want to delete the data?")){
            location.href = url;
        }
    });

	$('#btnPlay').on('click', function() {
		location.href = '/scramble';
	});
})(jQuery);
