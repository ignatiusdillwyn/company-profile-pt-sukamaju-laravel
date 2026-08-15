@extends('admin.layout')

@section('title', 'Article Form')

@php
  // dd($article);
@endphp

@section('breadcrumb')
  <li class="breadcrumb-item"><a
      href="{{ route('admin.article-index', ['article_type' => $type]) }}">{{ $type === 'service' ? 'Service' : 'Blog' }}</a>
  </li>
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
        <form action="{{ $action_path }}" id="form" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <!-- Hidden Fields -->
            <input type="hidden" name="user_id" value="{{ auth()->id() ?? 1 }}">
            <input type="hidden" id="type" name="type" value="{{ $type === 'blog' ? 'blog' : 'service' }}">

            @if($formType === 'edit' && isset($article['id']))
              <input type="hidden" id="article_id" name="article_id" value="{{ $article['id'] }}">
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
                  <img id="previewImg" src="{{ !empty($article['image']) ? asset($article['image']) : '' }}"
                    alt="Image Preview" style="
                                                        max-height: 200px;
                                                        width: 100%;
                                                        max-width: 300px;
                                                        object-fit: cover;
                                                        display: {{ !empty($article['image']) ? 'block' : 'none' }};
                                                    ">
                  <button id="btn-delete-image" name="btn-delete-image" type="button"
                    class="w-100 btn btn-danger btn-sm my-2 text-center btn-delete-image">
                    <i class="fas fa-times"></i> Remove
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
            <button id="saveButton" type="submit" class="btn btn-primary">
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

    //Button delete image
    $('.btn-delete-image').on('click', function (e) {
      e.preventDefault();
      console.log('Delete button clicked');

      const button = $(this);
      // const id = button.data('id');

      let article_id = $('#article_id').val();
      console.log('article id:', article_id);

      let type = $('#type').val();
      console.log('type:', type);

      if (!article_id) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'ID artikel tidak ditemukan!'
        });
        return;
      }

      Swal.fire({
        icon: 'warning',
        title: 'Yakin?',
        text: 'Yakin ingin menghapus image ini?',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          deleteImage();
        }
      });

      function deleteImage() {
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

              // ==========================================
              // 1. Kosongkan input imageName
              // ==========================================
              $('#imageName').val('');

              // ==========================================
              // 2. Reset input file
              // ==========================================
              $('#image').val('');

              // ==========================================
              // 3. Hapus source gambar
              // ==========================================
              $('#previewImg').removeAttr('src');

              // ==========================================
              // 4. Sembunyikan preview image
              // ==========================================
              $('#previewImg').hide();

              // ==========================================
              // 5. Sembunyikan container preview
              // ==========================================
              $('#imagePreview').hide();

              // ==========================================
              // 6. Jika ada hidden input removeImage
              // ==========================================
              $('#removeImage').val('1');

              // ==========================================
              // 7. Notifikasi
              // ==========================================
              Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: response.message || 'Gambar berhasil dihapus.',
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
      }
    });
  });

  //Create or Update Form
  $(document).ready(function () {

    $('#form').on('submit', function (e) {

      let form = $(this);
      let url = form.attr('action');
      let button = $('#saveButton');

      let type = $('#type').val();
      console.log('type:', type);

      let article_id = null
      if (type === 'edit') {
        article_id = $('#article_id').val();
      }

      $.ajax({
        url: url,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: form.serialize(),
        beforeSend: function () {
          button.prop('disabled', true).text('Sending...');
        },
        success: function (response) {
          if (response.success) {
            // Show success message
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: response.message ?? type === 'edit' ? 'Article updated successfully.' : 'Article created successfully.',
              confirmButtonText: 'OK',
            });
            // Reset the form
            form[0].reset();

            // Redirect to the index page after a short delay
            setTimeout(function () {
              window.location.href = response.redirect;
            }, 1500);
          } else {
            // ==========================================
            // ERROR: Tampilkan pesan error
            // ==========================================
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: response.message || 'An unexpected error occurred. Please try again later.',
              confirmButtonText: 'OK'
            });
          }

        },
        error: function (xhr) {
          // Show error messages
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
              text: 'An unexpected error occurred. Please try again later.',
              confirmButtonText: 'OK'
            });
          }
        },
        complete: function () {

          // Re-enable the submit button
          $('#saveButton').prop('disabled', false).text('Send Message');
        }
      });

      return false;
    });
  });
</script>