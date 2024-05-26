<table class=" table table-striped table-hover border ">
  <thead>
    <tr>
       <th scope="col" >#</th>
       <th scope="col" >Titolo</th>
       <th scope="col" >Sottotitolo</th>
       <th scope="col" >Categoria</th>
       <th scope="col" >Tags</th>
       <th scope="col" >Creato il</th>
       <th scope="col" >Azioni</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($articles as $article)
          <tr>
            <th scope="row" class="py-1">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->subtitle}}</td>
            <td>{{$article->category->name ?? 'non categorizzato'}}</td>
            <td>
                @foreach ($article->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </td>
            <td>{{$article->created_at->format('d/m/Y')}}</td>
            <td>
                <a href="{{route('article.show', compact('article'))}}" class="btn mybtn">Leggi l'articolo</a>
                <a href="{{route('article.edit', compact('article'))}}" class="btn mybtn">Modifica l'articolo</a>
                <form action="{{route('article.destroy',$article)}}" method="POST" class=" d-inline ">
                @method('DELETE')
                    @csrf
                    <button type="submit" class="btn mybtn">Elimina articolo</button>
                </form>
            </td>
          </tr>
      @endforeach
  </tbody>
</table>