<table class=" table table-striped table-hover border ">
  <thead>
    <tr>
       <th scope="col" >#</th>
       <th scope="col" >Nome</th>
       <th scope="col" >Email</th>
       <th scope="col" >Azioni</th>
       <th scope="col">Cancella</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($roleRequest as $user)
          <tr>
            <th scope="row" class="py-1">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              @switch($role)
              @case('amministratore')
                  <a href="{{ route('admin.setAdmin', compact('user')) }}"
                      class="btn mybtn">Attiva {{ $role }} </a>
              @break

              @case('revisore')
                  <a href="{{ route('admin.setRevisor', compact('user')) }}"
                      class="btn mybtn">Attiva {{ $role }} </a>
              @break

              @case('redattore')
                  <a href="{{ route('admin.setWriter', compact('user')) }}"
                      class="btn mybtn">Attiva {{ $role }} </a>
              @break
          @endswitch
                {{-- <button type="submit" class=" btn mybtn">Attiva{{$role}}</button> --}}
            </td>
            <!-- elimina ruoli -->
            <td>
              @switch($role)
              @case('amministratore')
                  <a href="{{ route('admin.deleteAdmin', compact('user')) }}"
                      class="btn bg-danger text-white ">Elimina {{ $role }} </a>
              @break

              @case('revisore')
                  <a href="{{ route('admin.deleteRevisor', compact('user')) }}"
                      class="btn bg-danger text-white ">Elimina {{ $role }} </a>
              @break

              @case('redattore')
                  <a href="{{ route('admin.deleteWriter', compact('user')) }}"
                      class="btn bg-danger text-white ">Elimina {{ $role }} </a>
              @break
          @endswitch
                {{-- <button type="submit" class=" btn mybtn">Elimina {{$role}}</button> --}}
            </td>
          </tr>
      @endforeach
  </tbody>
</table>