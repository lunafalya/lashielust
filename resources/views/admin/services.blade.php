@extends('layouts.admin')
@php
    $user = Auth::user();
@endphp


@section('content')

<div class="card card-content-bg p-5">
    
    <div class="d-flex justify-content-between align-items-center mb-5">
        
        <h1 class="fw-bold mb-0">My Services</h1>
    
        <button type="button" class="btn btn-add-service text-dark fw-bold" 
           style="background-color: #fcd881; padding: 0.75rem 1.5rem; border-radius: 0.5rem;"
           data-bs-toggle="modal" data-bs-target="#addServiceModal">
            Add +
        </button>
    </div>
    
    <div class="row">
        @foreach ($services as $service)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card service-card" style="border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                
                <div class="service-image-wrapper" style="background-color: #f7f3e8; padding: 10px; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                <img src="{{ asset('storage/' . $service->file_path) }}" alt="{{ $service->name }}" class="card-img-top" style="max-height: 150px; width: 100%; object-fit: contain; border-radius: 0.3rem;">
                </div>
                
                <div class="card-body p-3">
                    <h5 class="card-title fw-medium mb-1">{{ $service->name }}</h5>
                    <p class="card-text text-muted small mb-3">Rp. {{ number_format($service->price, 0, ',', '.') }}</p>
                    
                    <div class="d-flex justify-content-end">
                        
                        <button type="button" class="btn btn-sm text-dark me-2 edit-service-btn" title="Edit"
                                data-id="{{ $service->id }}"
                                data-name="{{ $service->name }}"
                                data-category="{{ $service->category }}"
                                data-type="{{ $service->type }}"
                                data-price="{{ $service->price }}"
                                data-description="{{ $service->description }}"
                                data-image="{{ asset('storage/' . $service->file_path) }}"
                                data-bs-toggle="modal"
                                data-bs-target="#editServiceModal">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        
                        <form action="/services/{{ $service->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn btn-sm text-danger" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('modals.add_service_modal')
@include('modals.edit_service_modal')

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Saat tombol edit diklik
    document.querySelectorAll('.edit-service-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = this.dataset.price;
            const category = this.dataset.category;
            const type = this.dataset.type;
            const description = this.dataset.description;
            const image = this.dataset.image;

            // Isi data ke dalam modal
            document.querySelector('#edit-modal-name').value = name;
            document.querySelector('#edit-modal-price').value = price;
            document.querySelector('#edit-modal-category').value = category;
            document.querySelector('#edit-modal-type').value = type;
            document.querySelector('#edit-modal-description').value = description;

            // Update preview image
            document.querySelector('#edit-modal-image-preview').src = image;

            // Update form action
            const form = document.querySelector('#editServiceModal form');
            form.action = `/services/update/${id}`; // pastikan route sesuai route('services.update', $id)
        });
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> {{-- Pastikan jQuery dimuat --}}
<script>
    $(document).ready(function() {
        
        $('#editServiceModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var modal = $(this);
            var form = modal.find('form');
            var id = button.data('id');

            var updateRoute = '/services/' + id; 
            form.attr('action', updateRoute);
            
            form.find('input[name="_method"]').remove(); 
            form.prepend('<input type="hidden" name="_method" value="PUT">');

            modal.find('#edit-modal-name').val(button.data('name'));
            modal.find('#edit-modal-category').val(button.data('category'));
            modal.find('#edit-modal-type').val(button.data('type'));
            modal.find('#edit-modal-price').val(button.data('price'));
            modal.find('#edit-modal-description').val(button.data('description'));
            modal.find('#edit-modal-image-preview').attr('src', button.data('image'));
            modal.find('#edit-modal-photo').val(''); 
        });
        
        $('#addServiceModal').on('show.bs.modal', function (event) {
            var modal = $(this);
            modal.find('form').trigger('reset');
            modal.find('input[name="_method"]').remove();
            modal.find('#add-modal-image-preview').attr('src', 'https://via.placeholder.com/250x180?text=Preview');
        });

        window.previewModalImage = function(event, previewId) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.objectFit = 'cover'; 
            };
            if (event.target.files.length > 0) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    });
</script>
@endsection