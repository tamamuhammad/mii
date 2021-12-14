$(function () {
	$('.tambah').on('click', function () {
		$('#addNewModal').html('Add New Modal');
		$('.modal-footer button[type=submit]').html('Add Menu');
		$('.modal-body form').attr('action', '/mii/menu/');

		$('#id').val();
		$('#menu').val();
	});

	$('.edit').on('click', function () {
		$('#addNewModal').html('Edit Menu Modal');
		$('.modal-footer button[type=submit]').html('Edit Menu');

		const id = $(this).data('id');
		$('.modal-body form').attr('action', '/mii/menu/edit/' + id);

		$.ajax({
			url: '/mii/menu/getedit',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#menu').val(data.menu);
			}
		});
	});
	$('.tambahsm').on('click', function () {
		$('#addNewSubModal').html('Add New Sub Menu');
		$('.modal-footer button[type=submit]').html('Add Submenu');
		$('.modal-body form').attr('action', '/mii/menu/submenu');

		$('#id').val();
		$('#submenu').val();
		$('#menu').val();
		$('#url').val();
		$('#icon').val();
		$('#active').val();
	});

	$('.editsm').on('click', function () {
		$('#addNewSubModal').html('Edit Sub Menu Modal');
		$('.modal-footer button[type=submit]').html('Edit Submenu');

		const id = $(this).data('id');
		$('.modal-body form').attr('action', '/mii/menu/editsm/' + id);

		$.ajax({
			url: '/mii/menu/geteditsm',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.title);
				$('#submenu').val(data.title);
				$('#menu').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#active').val(data.is_active);
			}
		});
	});
	$('.tR').on('click', function () {
		$('#addNewRole').html('Tambah Role Baru');
		$('.modal-footer button[type=submit]').html('Tambah Role');
		$('.modal-body form').attr('action', '/mii/admin/tambahRole');

		$('#id').val();
		$('#role').val();
	});

	$('.eR').on('click', function () {
		$('#addNewRole').html('Edit Role');
		$('.modal-footer button[type=submit]').html('Edit Role');

		const id = $(this).data('id');
		$('.modal-body form').attr('action', '/mii/admin/editRole/' + id);

		$.ajax({
			url: '/mii/admin/ambilrole',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#role').val(data.role);
			}
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
			url: "/mii/admin/changeAccess",
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
});

const flashData = $('.flash-data').data('flashdata');
const data = $('.flash-data').data('data');

if (flashData) {
	Swal.fire({
		title: data,
		text: 'Berhasil ' + flashData,
		type: 'success'
	})
}

$('.hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: data + ' akan dihapus',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Ga Jadi',
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})
