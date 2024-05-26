<table class=" table table-striped table-hover border ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titolo</th>
      <th scope="col">Sottotilo</th>
      <th scope="col">Redattore</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($articles as $article)
          <tr>
            <th scope="row" class="py-1">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->subtitle}}</td>
            <td>{{$article->user->name}}</td>
            <td>
              @if (is_null($article->is_accepted))
                <a href="{{route('article.show', $article)}}" class="btn mybtn text-decoration-none">Leggi l'articolo</a>
                @else 
                <form action="{{route('revisor.undoArticle', $article)}}" method="POST" >
                      @csrf
                      <button type="submit" class="btn mybtn my-2">Riporta in revisione</button>
                </form>
              @endif
            </td>
          </tr>
      @endforeach
  </tbody>
</table>