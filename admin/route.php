<?php
	switch($_GET['content']){
		case 'users':
			include 'users/view.php';
			break;
		case 'create-user':
			include 'users/create-user.php';
			break;
		case 'change-password':
			include 'users/change-password.php';
			break;
		case 'pages':
			include 'pages/view.php';
			break;
		case 'edit-page':
			include 'pages/edit-page.php';
			break;
		case 'add-page':
			include 'pages/add-page.php';
			break;
		case 'contact-us':
			include 'contact/contact-us.php';
			break;
		case 'projects':
			include 'projects/view.php';
			break;
		case 'add-project':
			include 'projects/add-project.php';
			break;
		case 'edit-project':
			include 'projects/edit-project.php';
			break;
		case 'categorys':
			include 'category/view.php';
			break;
		case 'add-category':
			include 'category/add-category.php';
			break;
		case 'edit-category':
			include 'category/edit-category.php';
			break;
		case 'menus':
			include 'menus/view.php';
			break;
		case 'add-menu':
			include 'menus/add-menu.php';
			break;
		case 'edit-menu':
			include 'menus/edit-menu.php';
			break;
		case 'products':
			include 'products/view.php';
			break;
		case 'add-product':
			include 'products/add-product.php';
			break;
		case 'edit-product':
			include 'products/edit-product.php';
			break;
		default: 
			include 'pages/view.php';
	}
?>