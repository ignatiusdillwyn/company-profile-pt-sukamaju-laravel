@extends('admin.layout')

@section('title', 'Article Form')

@php
  // dd($article);
@endphp

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('admin.article-index', ['article_type' => $type]) }}">Article</a></li>
  <li class="breadcrumb-item active" aria-current="page">Form</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        {{-- <div class="card-header">
          <h3 class="card-title">Create New {{ $type === 'blog' ? 'Blog' : 'Service' }}</h3>
        </div> --}}
        <!-- /.card-header -->
        <form action="{{ $action_path }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <!-- Hidden Fields -->
            <input type="hidden" name="user_id" value="{{ auth()->id() ?? 1 }}">
            <input type="hidden" name="type" value="{{ $type === 'blog' ? 'blog' : 'service' }}">

            @if($formType === 'edit' && isset($article['id']))
              <input type="hidden" name="article_id" value="{{ $article['id'] }}">
            @endif

            <!-- Title -->
            <div class="form-group">
              <label for="title">Title
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                placeholder="Enter {{ $type === 'blog' ? 'blog' : 'service' }} title"
                value="{{ $formType === 'edit' ? $article['title'] : $article->title ?? old('title') }}">
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <!-- Content -->
            <div class="form-group">
              <label for="content">Content
                {{-- <span class="text-danger">*</span> --}}
              </label>
              <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8"
                placeholder="Write {{ $type === 'blog' ? 'blog' : 'service' }} content here...">{{ $formType === 'edit' ? $article['content'] : $article->title ?? old('content') }}</textarea>
              @error('content')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <!-- Image -->
            <div class="form-group">
              <label for="image">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                    name="image" accept="image/*">
                  <input type="text" class="form-control mt-2 bg-body-secondary" id="imageName" name="imageName"
                    value="{{ $formType === 'edit' ? $article['image'] : old('imageName') }}" readonly>
                </div>
              </div>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <!-- Image Preview -->
              <div id="imagePreview" class="mt-2">
                <img id="previewImg" src="{{ asset($article['image'] ?? '') }}" alt="Image Preview"
                  style="max-height: 200px; width: 100%; max-width:300px; object-fit: cover; display: {{ isset($article['image']) ? 'block' : 'none' }};">
                <button type="button" class="w-100 btn btn-danger btn-sm my-2 text-center" id="removeImageBtn">
                  <i class="fas fa-times"></i> Remove
                </button>
              </div>
            </div>

            <!-- Is Published -->
            <div class="form-group">
              <label>Status</label>
              <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input @error('is_published') is-invalid @enderror"
                    id="is_published" name="is_published" value="1" {{ !empty($article['is_published']) && $article['is_published'] === 1 ? 'checked' : '' }}>
                  <label class="custom-control-label" for="is_published"></label>
                  <span id="statusLabel">Published</span>
                </label>
              </div>
              @error('is_published')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <small class="form-text text-muted">Toggle to publish the
                {{ $type === 'blog' ? 'blog' : 'service' }} or keep it as draft.</small>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Save {{ $type === 'blog' ? 'Blog' : 'Service' }}
            </button>
            <a href="{{ $redirect_path }}" class="btn btn-secondary">
              <i class="fas fa-times"></i> Cancel
            </a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@push('styles')
  <style>
    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "Browse";
    }

    .custom-switch .custom-control-label::before {
      border-radius: 1rem;
      width: 2.75rem;
      height: 1.5rem;
    }

    .custom-switch .custom-control-label::after {
      width: calc(1.5rem - 4px);
      height: calc(1.5rem - 4px);
      border-radius: 1rem;
    }

    .custom-switch .custom-control-input:checked~.custom-control-label::after {
      transform: translateX(1.25rem);
    }

    #imagePreview {
      border: 2px dashed #ddd;
      padding: 10px;
      border-radius: 5px;
      display: inline-block;
      background-color: #f9f9f9;
    }

    #previewImg {
      border-radius: 5px;
    }
  </style>
@endpush

@push('scripts')
  <script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function () {
      const title = this.value;
      const slug = title
        .toLowerCase()
        .replace(/[^a-z0-9\s]/g, '')  // Remove special characters
        .replace(/\s+/g, '-')          // Replace spaces with hyphens
        .replace(/-+/g, '-')           // Remove multiple hyphens
        .replace(/^-|-$/g, '');        // Remove leading/trailing hyphens

      const slugInput = document.getElementById('slug');
      if (!slugInput.dataset.manualEdit) {
        slugInput.value = slug;
      }
    });

    // Manual slug edit toggle
    document.getElementById('slug').addEventListener('focus', function () {
      this.dataset.manualEdit = 'true';
    });

    // Generate slug manually
    document.getElementById('generateSlugBtn').addEventListener('click', function () {
      const title = document.getElementById('title').value;
      const slug = title
        .toLowerCase()
        .replace(/[^a-z0-9\s]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');

      const slugInput = document.getElementById('slug');
      slugInput.value = slug || 'untitled';
      slugInput.dataset.manualEdit = 'true';
    });

    // Image preview
    document.getElementById('image').addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
          const preview = document.getElementById('imagePreview');
          const img = document.getElementById('previewImg');
          img.src = event.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);

        // Update file input label
        const label = document.querySelector('.custom-file-label');
        label.textContent = file.name;
      }
    });

    // Remove image
    document.getElementById('removeImageBtn').addEventListener('click', function () {
      document.getElementById('image').value = '';
      document.getElementById('imagePreview').style.display = 'none';
      document.querySelector('.custom-file-label').textContent = 'Choose file';
      document.getElementById('previewImg').src = '#';
    });

    // Toggle status label
    document.getElementById('is_published').addEventListener('change', function () {
      const label = document.getElementById('statusLabel');
      if (this.checked) {
        label.textContent = 'Published';
        label.className = 'badge badge-success';
      } else {
        label.textContent = 'Draft';
        label.className = 'badge badge-secondary';
      }
    });

    // Set initial status label
    document.addEventListener('DOMContentLoaded', function () {
      const statusCheckbox = document.getElementById('is_published');
      const label = document.getElementById('statusLabel');
      if (statusCheckbox.checked) {
        label.textContent = 'Published';
        label.className = 'badge badge-success';
      } else {
        label.textContent = 'Draft';
        label.className = 'badge badge-secondary';
      }
    });
  </script>

  <!-- Optional: Include TinyMCE or CKEditor for rich text editing -->
  @if(config('app.env') !== 'production')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // Uncomment below if you have TinyMCE API key
        /*
        tinymce.init({
            selector: '#content',
            height: 400,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
        */
      });
    </script>
  @endif
@endpush