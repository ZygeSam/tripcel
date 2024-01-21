<div class="container">
   <div class="col-12">
       <div class="card">
           <div class="card-body p-4 ">
               <p class="display-6">What do you want to do today?</p>
                   <span class="fw-medium d-block mb-1 d-fl list-unstyled">
                       <li><a href="{{route('client.support')}}" class="text-tripcel">Get Help with an eSIM</a></li>
                       <li><a href="{{route('client.profile')}}" class="text-tripcel">Update my profile and settings</a></li>
                       <li><a href="{{route('esim.index', auth()->user()->id)}}" class="text-tripcel">Order a New eSIM</a></li>
                   </span>
               </div>
           </div>
       </div>
   </div>
</div>