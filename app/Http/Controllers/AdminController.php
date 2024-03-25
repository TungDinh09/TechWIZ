<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    protected $CategoryController;
    protected $DeliveryController;
    protected $FeedBackController;
    protected $HomeController;
    protected $OrderController;
    protected $PaymentController;
    protected $PlantCategoryController;
    protected $ProductController;
    protected $ReviewController;
    protected $RoleController;
    protected $UserController;

    public function __construct(
        CategoryController $categoryController,
        DeliveryController $deliveryController,
        FeedBackController $feedBackController,
        HomeController $homeController,
        OrderController $orderController,
        PaymentController $paymentController,
        PlantCategoryController $plantCategoryController,
        ProductController $productController,
        ReviewController $reviewController,
        RoleController $roleController,
        UserController $userController
    ) {
        $this->CategoryController = $categoryController;
        $this->DeliveryController = $deliveryController;
        $this->FeedBackController = $feedBackController;
        $this->HomeController = $homeController;
        $this->OrderController = $orderController;
        $this->PaymentController = $paymentController;
        $this->PlantCategoryController = $plantCategoryController;
        $this->ProductController = $productController;
        $this->ReviewController = $reviewController;
        $this->RoleController = $roleController;
        $this->UserController = $userController;
    }
    // public function
}
