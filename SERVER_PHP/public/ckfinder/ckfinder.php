<?php
// use Illuminate\Support\Facades\Auth;

// require __DIR__.'/../../vendor/autoload.php';
// $app    = require_once __DIR__.'/../../bootstrap/app.php';
// $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// $response = $kernel->handle(
//     $request = Illuminate\Http\Request::capture()
// );
if (session_id() == '') {
    @session_start();
}
$auth = $_SESSION['user'];
?>
<!DOCTYPE html>
<!--
Copyright (c) 2007-2019, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or https://ckeditor.com/sales/license/ckfinder
-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>CKFinder 3 - File Browser</title>
</head>
<body>
	<?php if($auth){ ?>
	<script src="ckfinder.js"></script>
	<script>
		CKFinder.start();
	</script>
	<?php }else{ ?>
		bạn không có quyền truy cập
	<?php } ?>
</body>
</html>

