$(function () {
	$('.tambah').on('click', function () {
		$('#addNewModal').html('Add New Modal');
		$('.modal-footer button[type=submit]').html('Add Menu');
		$('modal-body form').attr('action', '/ci-login/menu/');
	});

	$('.edit').on('click', function () {
		$('#addNewModal').html('Edit Menu Modal');
		$('.modal-footer button[type=submit]').html('Edit Menu');

		const id = $(this).data('id');

		$('modal-body form').attr('action', '/ci-login/menu/edit/');

		$.ajax({
			url: '/ci-login/menu/getedit',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#menu').val(data.menu);
			}
		});
	});
	$('.tambahsm').on('click', function () {
		$('#addNewSubModal').html('Add New Sub Menu');
		$('.modal-footer button[type=submit]').html('Add Submenu');
		$('.modal-body form').attr('action', 'http://localhost/ci-login/menu/submenu');
	});

	$('.editsm').on('click', function () {
		$('#addNewSubModal').html('Edit Sub Menu Modal');
		$('.modal-footer button[type=submit]').html('Edit Submenu');

		const id = $(this).data('id');

		$('.modal-body form').attr('action', 'http://localhost/ci-login/menu/editsm'.id);

		$.ajax({
			url: '/ci-login/menu/geteditsm',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#submenu').val(data.title);
				$('#menu').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#active').val(data.is_active);
			}
		});
	});
});
$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass('selected').html(fileName);
});

$('.access').on('click', function () {
	const roleId = $(this).data('role');
	const menuId = $(this).data('menu');

	$.ajax({
		url: "http://localhost/ci-login/admin/changeAccess",
		method: 'post',
		data: {
			roleId: roleId,
			menuId: menuId
		},
		success: function () {
			document.location.href = +roleId;
		}
	});
});
