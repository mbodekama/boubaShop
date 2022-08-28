
 <div class="row no-gutters">
            <div class="col-md-6 col-xxl-3 mb-3 pr-md-2">
              <div class="card h-md-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2 d-flex align-items-center">Mes commandes du jour<span class="ml-1 text-400" data-toggle="tooltip" data-placement="top" title="Calculated according to last week's sales">
                  </span>
                  </h6>
                </div>
                <div class="card-body d-flex align-items-end">
                  <div class="row flex-grow-1">
                    <div class="col">
                      <div class="fs-4 font-weight-normal text-sans-serif text-700 line-height-1 mb-1">
                         {{getTComdNew()}}
                      </div><span class="badge badge-pill fs--2 badge-soft-success">Commandes</span>
                    </div>
                    <div class="col-auto pl-0">
                      <img class="mr-3" src="../assets/img/icons/weather-icon.png" alt="" height="60" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3 mb-3 pr-md-2">
              <div class="card h-md-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2 d-flex align-items-center">Total des produits<span class="ml-1 text-400" data-toggle="tooltip" data-placement="top" title="Calculated according to last week's sales">
                  </span>
                  </h6>
                </div>
                <div class="card-body d-flex align-items-end">
                  <div class="row flex-grow-1">
                    <div class="col">
                      <div class="fs-4 font-weight-normal text-sans-serif text-700 line-height-1 mb-1">
                         {{getTProd()}}
                      </div><span class="badge badge-pill fs--2 badge-soft-success">Produits</span>
                    </div>
                    <div class="col-auto pl-0">
                      <img class="mr-3" src="../assets/img/icons/weather-icon.png" alt="" height="60" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3 mb-3 pr-md-2">
              <div class="card h-md-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2 d-flex align-items-center">Nos clients<span class="ml-1 text-400" data-toggle="tooltip" data-placement="top" title="Calculated according to last week's sales">
                  </span>
                  </h6>
                </div>
                <div class="card-body d-flex align-items-end">
                  <div class="row flex-grow-1">
                    <div class="col">
                      <div class="fs-4 font-weight-normal text-sans-serif text-700 line-height-1 mb-1">
                        {{getClients()}}
                      </div><span class="badge badge-pill fs--2 badge-soft-success">clients</span>
                    </div>
                    <div class="col-auto pl-0">
                      <img class="mr-3" src="../assets/img/icons/customer.png" alt="" height="60" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3 mb-3 pr-md-2 pl-xxl-2">
              <div class="card h-md-100">
                <div class="card-body">
                  <div class="row h-100 justify-content-between no-gutters">
                    <div class="col-5 col-sm-6 col-xxl pr-2">
                      <h6 class="mt-1"></h6>
                      <div class="fs--2 mt-3">
                        <div class="d-flex flex-between-center mb-1">
                          <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="font-weight-semi-bold">
                          <b>Zone de livraison</b></span></div>
                          <div class="d-xxl-none">
                            {{getZone()}}
                          </div>
                        </div>
                        <div class="d-flex flex-between-center mb-1">
                          <div class="d-flex align-items-center">
                            <span class="dot bg-300"></span>
                            <span class="font-weight-semi-bold">
                             <b>Catégorie</b>
                            </span>
                          </div>
                          <div class="d-xxl-none">
                            {{getCatg()}}
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>



          </div>
          