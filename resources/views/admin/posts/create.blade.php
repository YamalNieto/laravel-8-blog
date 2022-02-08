@extends('layouts.app')

@section('content')
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 border-b">Publish New Post</h1>

        <div class="flex">
            @include('admin.posts._aside')

            <main class="flex-1">
                <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="border border-gray-200 p-6 rounded-xl max-w-md mx-auto">
                        <div class="mb-6">
                            <label for="title"
                                   class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Title
                            </label>

                            <input type="text"
                                   class="border border-gray-200 p-2 w-full rounded"
                                   name="title"
                                   id="title"
                                   value="{{ old('title') }}"
                                   required>

                            @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="slug"
                                   class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Slug
                            </label>

                            <input type="text"
                                   class="border border-gray-200 p-2 w-full rounded"
                                   name="slug"
                                   id="slug"
                                   value="{{ old('slug') }}"
                                   required>

                            @error('slug')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="thumbnail"
                                   class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Thumbnail
                            </label>

                            <input type="file"
                                   class="border border-gray-200 p-2 w-full rounded"
                                   name="thumbnail"
                                   id="thumbnail"
                                   required>

                            @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="excerpt"
                                   class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Excerpt
                            </label>

                            <textarea class="border border-gray-200 p-2 w-full rounded"
                                      name="excerpt"
                                      id="excerpt"
                                      required
                            >{{ old('excerpt') }}</textarea>

                            @error('excerpt')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="body"
                                   class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Body
                            </label>

                            <textarea class="border border-gray-200 p-2 w-full rounded"
                                      name="body"
                                      id="body"
                                      required
                            >{{ old('body') }}</textarea>

                            @error('body')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="category_id"
                                   class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Category
                            </label>

                            <select name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option
                                            value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    >{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                            Publish
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </section>
@endsection