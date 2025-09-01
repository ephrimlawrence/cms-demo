@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $config->website->name }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('website.edit', ['id' => $config->website_id]) }}"  enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label for="hero_title" class="col-form-label">Hero Title</label>
                            <input id="hero_title" type="text"
                                class="form-control @error('hero_title') is-invalid @enderror" name="hero_title"
                                value="{{ old('hero_title', $data->hero->title) }}" autocomplete="hero_title">
                            @error('hero_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="hero_subtitle" class="col-form-label">Subtitle</label>
                            <input id="hero_subtitle" type="text"
                                class="form-control @error('hero_subtitle') is-invalid @enderror" name="hero_subtitle"
                                value="{{ old('hero_subtitle', $data->hero->subtitle) }}" autocomplete="hero_subtitle">
                            @error('hero_subtitle')
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
                            <label for="features_summary" class="col-form-label">Summary</label>
                            <textarea id="features_summary" class="form-control @error('features_summary') is-invalid @enderror"
                                name="features_summary">{{ old('summary', $data->features->summary) }}</textarea>
                            @error('features_summary')
                                <span class="invalid-feedback" role="alert"></span>
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @foreach ($data->features->items as $feature)
                            @php
                                $count = $loop->index + 1;
                                $title_id = 'feature' . $count . '_title';
                                $description_id = 'feature' . $count . '_description';
                            @endphp

                            <div class="row">
                                <div class="col">
                                    <label for="{{ $title_id }}" class="col-form-label">Feature {{ $count }}
                                        Title</label>
                                    <input id="{{ $title_id }}" type="text"
                                        class="form-control @error($title_id) is-invalid @enderror"
                                        name="{{ $title_id }}" value="{{ old($title_id, $feature->title) }}"
                                        autocomplete="{{ $title_id }}">
                                    @error($title_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="{{ $description_id }}" class="col-form-label">Feature {{ $count }}
                                        Description</label>
                                    <textarea id="{{ $description_id }}" class="form-control @error($description_id) is-invalid @enderror"
                                        name="{{ $description_id }}">{{ old($description_id, $feature->description) }}</textarea>
                                    @error($description_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </fieldset>

                    <fieldset>
                        <legend class="mt-3">Pricing Plans</legend>
                        <hr>
                        @foreach ($data->pricing_plans as $plan)
                            @php
                                $count = $loop->index + 1;
                                $title_id = 'plan' . $count . '_title';
                                $price_id = 'plan' . $count . '_price';
                                $features_id = 'plan' . $count . '_features';
                            @endphp

                            <div class="row">
                                <div class="col">
                                    <label for="{{ $title_id }}" class="col-form-label">Plan {{ $count }}
                                        Title</label>
                                    <input id="{{ $title_id }}" type="text"
                                        class="form-control @error($title_id) is-invalid @enderror"
                                        name="{{ $title_id }}" value="{{ old($title_id, $plan->title) }}"
                                        autocomplete="{{ $title_id }}">
                                    @error($title_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="{{ $price_id }}" class="col-form-label">Plan {{ $count }}
                                        Price</label>
                                    <input id="{{ $price_id }}" type="number"
                                        class="form-control @error($price_id) is-invalid @enderror"
                                        name="{{ $price_id }}" value="{{ old($price_id, $plan->price) }}"
                                        autocomplete="plan1_price">
                                    @error($price_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="{{ $features_id }}" class="col-form-label">Plan {{ $count }}
                                        Features (comma separated)</label>

                                    <textarea id="{{ $features_id }}" class="form-control @error($features_id) is-invalid @enderror"
                                        name="{{ $features_id }}">{{ old($features_id, implode(',', $plan->features)) }}</textarea>

                                    @error($features_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                    </fieldset>

                    <fieldset>
                        <legend class="mt-3">Testimonials</legend>
                        <hr>

                        @foreach ($data->testimonials as $testimonial)
                            @php
                                $count = $loop->index + 1;
                                $author_id = 'testimonial' . $count . '_author';
                                $text_id = 'testimonial' . $count . '_text';
                                $image_id = 'testimonial' . $count . '_image';
                            @endphp
                            <div class="row">
                                <div class="col">
                                    <label for="{{ $author_id }}" class="col-form-label">Testimonial
                                        {{ $count }} Author</label>
                                    <input id="{{ $author_id }}" type="text"
                                        class="form-control @error($author_id) is-invalid @enderror"
                                        name="{{ $author_id }}" value="{{ old($author_id, $testimonial->author) }}"
                                        autocomplete="{{ $author_id }}">
                                    @error($author_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="{{ $text_id }}" class="col-form-label">Testimonial
                                        {{ $count }} Text</label>
                                    <textarea id="{{ $text_id }}" class="form-control @error($text_id) is-invalid @enderror"
                                        name="{{ $text_id }}">{{ old($text_id, $testimonial->text) }}</textarea>
                                    @error($text_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="{{ $image_id }}" class="col-form-label">Testimonial
                                        {{ $count }} Image</label>
                                    <input type="file" id="{{ $image_id }}"
                                        class="form-control @error($image_id) is-invalid @enderror"
                                        name="{{ $image_id }}">
                                    @error($image_id)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

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
