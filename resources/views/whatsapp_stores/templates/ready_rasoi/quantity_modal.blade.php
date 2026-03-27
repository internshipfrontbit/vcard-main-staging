      <!-- Modal -->
      <style>
          .newWhatsappButton{
              background: #25d366 !important;
          }
          .newWhatsappButton:hover{
              color: #000000 !important;
          }
      </style>
      <div class="modal fade" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif id="quantityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="width: 388px;margin: auto;" @if (getLanguage($whatsappStore->default_language) == 'Arabic') dir="rtl" @endif>
                  <div class="modal-header px-0 pt-0">
                      <input type="hidden" value="{{ $whatsappStore->id }}" id="whatsappStoreId">
                      <h5 class="modal-title fs-20 fw-6" id="exampleModalLabel">
                          Quantity 
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body pb-0">
                      <div class="overflow-auto mb-3">
                          <input class="form-control" type="number" id="quantityInput" placeholder="Please Enter Quantity" value="1"/>
                      </div>
                     
                 
                         <button type="button"
                          class="newWhatsappButton btn btn-primary m-0 w-100" id="newWhatsappOrderButton">
                          @if($whatsappStore->id != 208)
                            Send Order on WhatsApp
                          @else
                            Add to cart
                          @endif
                         </button>
                   
                      
                  </div>
              </div>
          </div>
      </div>
      
