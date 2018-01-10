$(function () {
    // Slider Lists
    if (document.getElementById('slider_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "slider_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Keunggulan Lists
    if (document.getElementById('keunggulan_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "keunggulan_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Galeri Lists
    if (document.getElementById('galeri_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "galeri_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Testimonial Lists
    if (document.getElementById('testimonial_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "testimonial_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Produk Lists
    if (document.getElementById('produk_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "produk_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Produk Tipe Lists
    if (document.getElementById('produk_tipe_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "produk_tipe_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Pengaturan Lists
    if (document.getElementById('pengaturan_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "pengaturan_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Admin Lists
    if (document.getElementById('admin_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});