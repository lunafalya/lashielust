<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1rem; background-color: white;">
            
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="addServiceModalLabel">Add Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                
                <form action="{{ route('services.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    
                    <div class="row">
                        
                        <div class="col-md-5 mb-4">
                            <div class="d-flex flex-column align-items-start">
                                
                                <div class="mb-3" style="width: 100%; max-width: 250px; height: 180px; background-color: #fcf8ee; border-radius: 0.5rem; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                    <div class="profile-avatar">
                                        <img id="add-modal-image-preview" src="https://via.placeholder.com/250x180?text=Preview" alt="Service Photo Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;">
                                    </div>

    
                                <!-- <img id="add-modal-image-preview" src="https://via.placeholder.com/250x180?text=Preview" alt="Service Photo Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;"> -->
                                </div>
                                
                                <p class="fw-medium mb-2">Upload Photo</p>
                                
                                <label class="btn btn-warning fw-bold d-flex align-items-center justify-content-center" style="background-color: #fcd881; color: #333; padding: 0.75rem 1.5rem; border-radius: 0.5rem; cursor: pointer; border: none;">
                                    Choose File 
                                    <i class="fas fa-arrow-right ms-2"></i>
                                    <input type="file" id="add-modal-photo" name="photo" class="d-none" onchange="previewModalImage(event, 'add-modal-image-preview')">
                                </label>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-7">
                            
                            <div class="mb-3">
                                <label for="add-modal-name" class="form-label fw-medium">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required style="border-radius: 0.3rem;">
                                <!-- <input type="text" class="form-control" id="add-modal-name" name="name" required style="border-radius: 0.3rem;"> -->
                            </div>
                            
                            <div class="mb-3">
                                <label for="add-modal-category" class="form-label fw-medium">Category</label>
                                <select class="form-select" id="add-modal-category" name="category" required style="border-radius: 0.3rem;">
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="Eyes">Eyes</option>
                                    <option value="Piercing">Piercing</option>
                                    <option value="Nails">Nails</option>
                                    <option value="Lash">Body</option>
                                    <option value="Hair">Hair</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="add-modal-type" class="form-label fw-medium">Type</label>
                                <input type="text" class="form-control" id="add-modal-type" name="type" style="border-radius: 0.3rem;">
                            </div>
                            
                            <div class="mb-3">
                                <label for="add-modal-price" class="form-label fw-medium">Price</label>
                                <input type="number" class="form-control" id="add-modal-price" name="price" required style="border-radius: 0.3rem;">
                            </div>
                            
                            <div class="mb-3">
                                <label for="add-modal-description" class="form-label fw-medium">Description</label>
                                <textarea class="form-control" id="add-modal-description" name="description" rows="3" style="border-radius: 0.3rem;"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-warning fw-bold me-3" style="background-color: #fcd881; color: #333; padding: 0.75rem 2rem; border-radius: 0.5rem; border: none;">
                            Add
                        </button>
                        <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal" style="background-color: #ff0000; color: white; padding: 0.75rem 2rem; border-radius: 0.5rem; border: none;">
                            Cancel
                        </button>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>
@if(session('success'))
    <div id="success-alert" class="alert-fixed">
        {{ session('success') }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', () => {
    const alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(() => {
            alert.remove();
        }, 4000);
    }
});
</script>