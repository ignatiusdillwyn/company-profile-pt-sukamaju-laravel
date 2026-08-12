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
              @if($formType === 'edit' && isset($article['id']))
                <div id="imagePreview" class="mt-2">
                  <img id="previewImg" src="{{ asset($article['image'] ?? '') }}" alt="Image Preview"
                    style="max-height: 200px; width: 100%; max-width:300px; object-fit: cover; display: {{ isset($article['image']) ? 'block' : 'none' }};">
                  <button type="button" class="w-100 btn btn-danger btn-sm my-2 text-center btn-delete-image"
                    id="removeImageBtn">
                    Remove
                    </a>
                  </button>
                </div>
              @endif
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
    console.log('Document ready!');

    $('.btn-delete-image').on('click', function (e) {
      e.preventDefault();
      console.log('Delete button clicked');

      const button = $(this);
      const id = button.data('id');

      let article_id = $('input[name="article_id"]').val();
      console.log('article id:', article_id);

      let type = $('input[name="type"]').val();
      console.log('type:', type);

      if (!article_id) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'ID artikel tidak ditemukan!'
        });
        return;
      }

      if (!confirm('Yakin ingin menghapus image ini?')) {
        return;
      }

      $.ajax({
        url: `/admin/article/remove-image/${article_id}`,
        type: 'POST',
        data: {
          article_id: article_id,
          type: type
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
          button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Deleting...');
        },
        success: function (response) {
          console.log('response:', response);

          if (response.success) {
            console.log('sukses delete image');

            // 🔥 ===== HILANGKAN PREVIEW IMAGE =====

            // 1. Kosongkan src gambar
            $('#previewImg').attr('src', '');

            // 2. Sembunyikan container preview dengan animasi
            $('#imagePreview').fadeOut(300, function () {
              // Setelah animasi selesai, pastikan src kosong
              $('#previewImg').attr('src', '');
            });

            // 3. Kosongkan input imageName
            $('#imageName').val('');

            // 4. Reset input file
            $('#image').val('');
            $('.custom-file-label').text('Choose file');

            // 5. Set hidden field remove_image = 1 (jika ada)
            if ($('#removeImage').length) {
              $('#removeImage').val('1');
            }

            // 6. Tampilkan notifikasi sukses
            Swal.fire({
              icon: 'success',
              title: 'Berhasil!',
              text: response.message || 'Image berhasil dihapus.',
              confirmButtonText: 'OK'
            });
          }
        },
        error: function (xhr) {
          console.error('Error:', xhr);
          console.error('Response Text:', xhr.responseText);

          if (xhr.status === 419) {
            Swal.fire({
              icon: 'error',
              title: 'Session Expired',
              text: 'Silakan refresh halaman dan coba lagi.',
              confirmButtonText: 'Refresh'
            }).then(() => window.location.reload());
            return;
          }

          if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            var errorMessages = '';
            $.each(errors, function (key, value) {
              errorMessages += value[0] + '\n';
            });

            Swal.fire({
              icon: 'error',
              title: 'Oops!',
              text: errorMessages,
              confirmButtonText: 'OK'
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops!',
              text: xhr.responseJSON?.message || 'An unexpected error occurred. Please try again later.',
              confirmButtonText: 'OK'
            });
          }
        },
        complete: function () {
          button.prop('disabled', false).html('<i class="fas fa-times"></i> Remove');
        }
      });
    });
  });
</script>