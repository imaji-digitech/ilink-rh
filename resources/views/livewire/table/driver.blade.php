<div>
    <x-data-table :model="$articles">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Judul
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>
                <th>Jumlah</th>
                <th>Thumbanil</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($articles as $index=>$article)
                <tr x-data="window.__controller.dataTableController({{ $article->id }})"
                    class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->articleViews->count() }}</td>
                    <td><img src="{{asset('storage/'.$article->thumbnail)}}" alt="" style="width: 100px"></td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.article.edit',$article->id) }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" href="{{ route('admin.article.show',$article->id) }}" class="mr-3"><i
                                class="fa fa-16px fa-eye"></i></a>
                        <a role="button" wire:click="deleteItem({{ $article->id }})" href="#" class="mr-3"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                        @if($article->file!=null)
                            <a role="button" class="mr-3" href="{{route('admin.download',['article',$article->id])}}">
                                <i class="fa fa-16px fa-download"></i> Artikel
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

