@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $website->name }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('website.edit', ['id' => $website->id]) }}">
                    @csrf

                    <div class="row">
                        <div class="col">

                            <label for="name" class="col-form-label text-md-end">Site Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $website->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="hero_title" class="col-form-label">Hero Title</label>
                            <input id="hero_title" type="text"
                                class="form-control @error('hero_title') is-invalid @enderror" name="hero_title"
                                value="{{ old('hero_title', $website->hero_title) }}" required autocomplete="hero_title">
                            @error('hero_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="subtitle" class="col-form-label">Subtitle</label>
                            <input id="subtitle" type="text"
                                class="form-control @error('subtitle') is-invalid @enderror" name="subtitle"
                                value="{{ old('subtitle', $website->subtitle) }}" required autocomplete="subtitle">
                            @error('subtitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <fieldset class="p-2 mt-3 ">
                        <legend>Features</legend>
                        <hr>
                        <div class="col">
                            <label for="summary" class="col-form-label">Summary</label>
                            <textarea id="summary" class="form-control @error('summary') is-invalid @enderror" name="summary" required>{{ old('summary', $website->summary) }}</textarea>
                            @error('summary')
                                <span class="invalid-feedback" role="alert"></span>
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="feature1_title" class="col-form-label">Feature 1 Title</label>
                                <input id="feature1_title" type="text"
                                    class="form-control @error('feature1_title') is-invalid @enderror" name="feature1_title"
                                    value="{{ old('feature1_title', $website->feature1_title) }}" required
                                    autocomplete="feature1_title">
                                @error('feature1_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="feature1_description" class="col-form-label">Feature 1
                                    Description</label>
                                <textarea id="feature1_description" class="form-control @error('feature1_description') is-invalid @enderror"
                                    name="feature1_description" required>{{ old('feature1_description', $website->feature1_description) }}</textarea>
                                @error('feature1_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="feature2_title" class="col-form-label">Feature 2 Title</label>
                                <input id="feature2_title" type="text"
                                    class="form-control @error('feature2_title') is-invalid @enderror" name="feature2_title"
                                    value="{{ old('feature2_title', $website->feature2_title) }}" required
                                    autocomplete="feature2_title">
                                @error('feature2_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">

                                <label for="feature2_description" class="col-form-label">Feature 2
                                    Description</label>
                                <textarea id="feature2_description" class="form-control @error('feature2_description') is-invalid @enderror"
                                    name="feature2_description" required>{{ old('feature2_description', $website->feature2_description) }}</textarea>
                                @error('feature2_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="feature3_title" class="col-form-label">Feature 3 Title</label>
                                <input id="feature3_title" type="text"
                                    class="form-control @error('feature3_title') is-invalid @enderror" name="feature3_title"
                                    value="{{ old('feature3_title', $website->feature3_title) }}" required
                                    autocomplete="feature3_title">
                                @error('feature3_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="feature3_description" class="col-form-label">Feature 3
                                    Description</label>
                                <textarea id="feature3_description" class="form-control @error('feature3_description') is-invalid @enderror"
                                    name="feature3_description" required>{{ old('feature3_description', $website->feature3_description) }}</textarea>
                                @error('feature3_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <fieldset>
                            <legend class="mt-3">Pricing Plans</legend>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <label for="plan1_title" class="col-form-label">Plan 1 Title</label>
                                    <input id="plan1_title" type="text"
                                        class="form-control @error('plan1_title') is-invalid @enderror"
                                        name="plan1_title" value="{{ old('plan1_title', $website->plan1_title) }}"
                                        required autocomplete="plan1_title">
                                    @error('plan1_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="plan1_price" class="col-form-label">Plan 1 Price</label>
                                    <input id="plan1_price" type="text"
                                        class="form-control @error('plan1_price') is-invalid @enderror"
                                        name="plan1_price" value="{{ old('plan1_price', $website->plan1_price) }}"
                                        required autocomplete="plan1_price">
                                    @error('plan1_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="plan1_features" class="col-form-label">Plan 1 Features (comma
                                        separated)</label>

                                    <textarea id="plan1_features" class="form-control @error('plan1_features') is-invalid @enderror"
                                        name="plan1_features" required>{{ old('plan1_features', $website->plan1_features) }}</textarea>

                                    @error('plan1_features')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="plan2_title" class="col-form-label">Plan 2 Title</label>
                                    <input id="plan2_title" type="text"
                                        class="form-control @error('plan2_title') is-invalid @enderror"
                                        name="plan2_title" value="{{ old('plan2_title', $website->plan2_title) }}"
                                        required autocomplete="plan2_title">
                                    @error('plan2_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="plan2_price" class="col-form-label">Plan 2 Price</label>
                                    <input id="plan2_price" type="text"
                                        class="form-control @error('plan2_price') is-invalid @enderror"
                                        name="plan2_price" value="{{ old('plan2_price', $website->plan2_price) }}"
                                        required autocomplete="plan2_price">
                                    @error('plan2_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="plan2_features" class="col-form-label">Plan 2 Features (comma
                                        separated)</label>
                                    <textarea id="plan2_features" class="form-control @error('plan2_features') is-invalid @enderror"
                                        name="plan2_features" required>{{ old('plan2_features', $website->plan2_features) }}</textarea>
                                    @error('plan2_features')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="plan3_title" class="col-form-label">Plan 3 Title</label>
                                    <input id="plan3_title" type="text"
                                        class="form-control @error('plan3_title') is-invalid @enderror"
                                        name="plan3_title" value="{{ old('plan3_title', $website->plan3_title) }}"
                                        required autocomplete="plan3_title">
                                    @error('plan3_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="plan3_price" class="col-form-label">Plan 3 Price</label>
                                    <input id="plan3_price" type="text"
                                        class="form-control @error('plan3_price') is-invalid @enderror"
                                        name="plan3_price" value="{{ old('plan3_price', $website->plan3_price) }}"
                                        required autocomplete="plan3_price">
                                    @error('plan3_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="plan3_features" class="col-form-label">Plan 3 Features (comma
                                        separated)</label>
                                    <textarea id="plan3_features" class="form-control @error('plan3_features') is-invalid @enderror"
                                        name="plan3_features" required>{{ old('plan3_features', $website->plan3_features) }}</textarea>
                                    @error('plan3_features')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="mt-3">Testimonials</legend>
                            <hr>
                            <!-- add 3 fields for testimonials: author, testimonial, image upload field -->
                            <div class="row">
                                <div class="col">
                                    <label for="testimonial1_author" class="col-form-label">Testimonial 1
                                        Author</label>
                                    <input id="testimonial1_author" type="text"
                                        class="form-control @error('testimonial1_author') is-invalid @enderror"
                                        name="testimonial1_author"
                                        value="{{ old('testimonial1_author', $website->testimonial1_author) }}" required
                                        autocomplete="testimonial1_author">
                                    @error('testimonial1_author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="testimonial1_text" class="col-form-label">Testimonial 1 Text</label>
                                    <textarea id="testimonial1_text" class="form-control @error('testimonial1_text') is-invalid @enderror"
                                        name="testimonial1_text" required>{{ old('testimonial1_text', $website->testimonial1_text) }}</textarea>
                                    @error('testimonial1_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="testimonial1_image" class="col-form-label">Testimonial 1 Image</label>
                                    <input type="file" id="testimonial1_image"
                                        class="form-control @error('testimonial1_image') is-invalid @enderror"
                                        name="testimonial1_image">
                                    @error('testimonial1_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="testimonial2_author" class="col-form-label">Testimonial 2
                                        Author</label>
                                    <input id="testimonial2_author" type="text"
                                        class="form-control @error('testimonial2_author') is-invalid @enderror"
                                        name="testimonial2_author"
                                        value="{{ old('testimonial2_author', $website->testimonial2_author) }}" required
                                        autocomplete="testimonial2_author">
                                    @error('testimonial2_author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="testimonial2_text" class="col-form-label">Testimonial 2 Text</label>
                                    <textarea id="testimonial2_text" class="form-control @error('testimonial2_text') is-invalid @enderror"
                                        name="testimonial2_text" required>{{ old('testimonial2_text', $website->testimonial2_text) }}</textarea>
                                    @error('testimonial2_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="testimonial2_image" class="col-form-label">Testimonial 2 Image</label>
                                    <input type="file" id="testimonial2_image"
                                        class="form-control @error('testimonial2_image') is-invalid @enderror"
                                        name="testimonial2_image">
                                    @error('testimonial2_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="testimonial3_author" class="col-form-label">Testimonial 3
                                        Author</label>
                                    <input id="testimonial3_author" type="text"
                                        class="form-control @error('testimonial3_author') is-invalid @enderror"
                                        name="testimonial3_author"
                                        value="{{ old('testimonial3_author', $website->testimonial3_author) }}" required
                                        autocomplete="testimonial3_author">
                                    @error('testimonial3_author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="testimonial3_text" class="col-form-label">Testimonial 3 Text</label>
                                    <textarea id="testimonial3_text" class="form-control @error('testimonial3_text') is-invalid @enderror"
                                        name="testimonial3_text" required>{{ old('testimonial3_text', $website->testimonial3_text) }}</textarea>
                                    @error('testimonial3_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="testimonial3_image" class="col-form-label">Testimonial 3 Image</label>
                                    <input type="file" id="testimonial3_image"
                                        class="form-control @error('testimonial3_image') is-invalid @enderror"
                                        name="testimonial3_image">
                                    @error('testimonial3_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary block">
                                Save Changes
                            </button>
                        </div>
            </div>
            </fieldset>
            </form>
        </div>
    </div>
@endsection
