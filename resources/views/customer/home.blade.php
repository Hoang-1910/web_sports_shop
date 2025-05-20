@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
    <div class="container-fluid py-4">
        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="hero-bg p-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&q=80" class="rounded me-4" style="width:120px;height:160px;object-fit:cover;" alt="Hero">
                        <div>
                            <h3 class="fw-bold mb-2">New Collection Launch</h3>
                            <p class="mb-3">Introducing the new collection inspired by the vibrant colors of the new style.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-light me-2">&#8592;</button>
                        <button class="btn btn-light">&#8594;</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card p-4 text-center">
                    <div class="display-4 fw-bold">70</div>
                    <div class="text-danger">Summer Goods Sale Starts</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card p-0 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=400&q=80" class="img-fluid w-100" alt="Leggings">
                    <div class="p-3">Leggings</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card p-0 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" class="img-fluid w-100" alt="Hoodies">
                    <div class="p-3">Hoodies & Sweatshirts</div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h5 class="fw-bold mb-3">Most Popular Products</h5>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="product-card p-3 text-center">
                        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=200&q=80" class="img-fluid mb-2" alt="Combo White T-shirt">
                        <div>Combo White T-shirt</div>
                        <div class="text-muted small">Women's Clothing</div>
                        <div class="fw-bold">$29</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="product-card p-3 text-center">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=200&q=80" class="img-fluid mb-2" alt="Orange Sports Dress">
                        <div>Orange Sports Dress</div>
                        <div class="text-muted small">Women's Clothing</div>
                        <div class="fw-bold">$29</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="product-card p-3 text-center">
                        <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=200&q=80" class="img-fluid mb-2" alt="Orange Sports Dress">
                        <div>Orange Sports Dress</div>
                        <div class="text-muted small">Women's Clothing</div>
                        <div class="fw-bold">$80</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="product-card p-3 text-center">
                        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=200&q=80" class="img-fluid mb-2" alt="Orange Sports Dress">
                        <div>Orange Sports Dress</div>
                        <div class="text-muted small">Women's Clothing</div>
                        <div class="fw-bold">$29</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter-box p-4 my-5 d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
                <span class="fw-bold">Sign up for the Newsletter and get a 10% discount</span>
            </div>
            <form class="d-flex w-100 w-md-auto" style="max-width:400px;">
                <input type="email" class="form-control me-2" placeholder="E-mail Address" required>
                <button class="btn btn-primary" type="submit">&rarr;</button>
            </form>
        </div>
    </div>
@endsection
