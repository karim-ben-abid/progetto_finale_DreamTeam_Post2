 <!-- Footer -->
 <div class="container-fluid bg-dark my-1 p-3">
     <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
         <div class="col-12 mb-3 d-flex justify-content-center flex-column align-items-center">
             <a href="{{ route('homepage') }}" class="link-body-emphasis text-decoration-none">
                 <div class="d-flex flex-column justify-content-center align-items-center">
                     <img src="/media/logodt3.png" class="logoFooter" alt="">
                     <li class="list-unstyled">
                         <i> © 2024</i>
                     </li>
                 </div>
             </a>
             <div class="mt-3">
                 <a href="https://github.com/Hackademy-142/DreamTeam_Post2" target="_blank"
                     class="nav-link p-0 text-body-secondary font-dosis">
                     <i class="bi bi-github">Github</i>
                 </a>
                 <a href="https://www.instagram.com/kba_rimka/" target="_blank"
                     class="nav-link p-0 text-body-secondary font-dosis">
                     <i class="bi bi-instagram">Instagram</i>
                 </a>
             </div>
         </div>

         <div class="col-12 mb-3 text-center">
             <h5 class="tx-1">{{__('ui.session')}}</h5>
             <ul class="nav flex-column">
                 <li class="nav-item mb-2"><a href="{{ route('homepage') }}"
                         class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.home')}}</a></li>
                 <li class="nav-item mb-2"><a href="/staff"
                         class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.staff')}}</a></li>
                 <li class="nav-item mb-2"><a href="/staff"
                         class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.info')}}</a></li>
                 <li class="nav-item mb-2"><a href="/staff"
                         class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.contact')}}</a></li>
             </ul>
         </div>

         <div class="col-12 mb-3 text-center">
             <h5 class="tx-1">{{__('ui.info')}}</h5>
             <ul class="nav flex-column">
                 <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.Privacy policy')}}</a></li>
                 <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.Use of terms')}}</a></li>
                 <li class="nav-item mb-2"><a href=""
                         class="nav-link p-0 text-body-secondary font-dosis">{{__('ui.Copyright')}}</a></li>
             </ul>
         </div>

         <div class="col-12 mb-3 text-center">
             <h5 class="tx-1">{{__('ui.seguici')}}</h5>
             <ul class="nav flex-column">
                 <li class="nav-item mb-2 display-5"><a href="" target="_blank"
                         class="nav-link p-0 text-body-secondary font-dosis">
                         <i class="bi bi-facebook tx-acc"></i>
                     </a></li>
                 <li class="nav-item mb-2 display-5"><a href="" target="_blank"
                         class="nav-link p-0 text-body-secondary font-dosis">
                         <i class="bi bi-instagram tx-acc"></i>
                     </a></li>
             </ul>
         </div>
     </footer>
 </div>
 <!-- fine Footer -->
