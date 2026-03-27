<!-- Modal -->
      <style>
          .newWhatsappButton{
              background: #25d366 !important;
          }
          .newWhatsappButton:hover{
              color: #000000 !important;
          }
      </style>
<div class="modal fade restaurant-add-cart-modal" id="quantityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0" style="width: 333px !important;margin: auto;">
            <div class="modal-header px-0 pt-0" style="background: #1d1d1d;color: #ffffff;padding: 10px 20px !important;">
                      <input type="hidden" value="{{ $whatsappStore->id }}" id="whatsappStoreId">
                      <h5 class="modal-title fs-20 fw-6" id="exampleModalLabel">
                          Quantity 
                      </h5>
                      <button type="button" class="btn-close" style="color: #ffffff !important" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
            <div class="modal-body p-0" style="background: #1d1d1d;padding: 25px 20px 10px 20px !important;">
                <div class="row row-gap-30px mx-0">
                    <div class="overflow-auto mb-3">
                                      <input class="form-control" type="number" id="quantityInput" placeholder="Please Enter Quantity" value="1"/>
                                  </div>
                </div>
            </div>
            <div class="modal-footer px-0 pt-0" style="background: #1d1d1d;color: #ffffff;padding: 10px 20px !important;">
                      
                       <button type="button" 
                                  class="newWhatsappButton btn btn-primary m-0 w-100" id="newWhatsappOrderButton">
                                  Send Order on WhatsApp
                                 </button>
                  </div>
        </div>
    </div>
</div>


      
      
