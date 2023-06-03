 <div class="row pt-4">
   <div class="col">
     <div class="card-deck">


       @foreach ($post_top3 as $post)
         <div class="card bg-dark text-white ">
           <a href="{{ route('posts.public', $post) }}">
             <img src="{{ $post->image('card') }}" class="card-img rounded" alt="...">
             <div class="card-img-overlay ">
               <div class="row h-100 align-content-end">
                 <div class="col">
                   <h4 class=" text-bold text-light text-shadow">
                     {{ \Illuminate\Support\Str::limit($post->title, 50, '...') }}</h4>
                 </div>
               </div>
             </div>
           </a>
         </div>
       @endforeach



     </div>
   </div>
 </div>
