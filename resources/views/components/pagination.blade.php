<div class="col-md-9 d-flex align-items-center justify-content-end gap-4">
    <div class="d-flex d-flex-custom align-items-center gap-2">
        <select class="form-control" data-trigger name="perPage" id="select-per-page">
            @foreach ($perPageItems as $limit)
            <option value="{{$limit}}" @selected($limit==$perPage)>{{$limit}}</option>
            @endforeach
        </select>
        <label for="choices-single-no-search " class="form-label font-size-13 text-muted mb-0">件/ページ</label>
    </div>
    <ul class="pagination pagination-rounded justify-content-center justify-content-sm-end mb-sm-0">
        <li class="page-item {{$curPage == 1 ? 'disabled' : ''}}">
            <a href="{{$url}}?page={{$curPage - 1}}" class="page-link"><</a>
        </li>
        @if ($totalPages <= 9) 
            @for($page = 1; $page <= $totalPages; $page ++) 
                <li class="page-item {{$page == $curPage ? 'active' : ''}}">
                    <a href="{{$url}}?page={{$page}}" class="page-link">{{$page}}</a>
                </li>
            @endfor
        @else
            <li class="page-item {{1 == $curPage ? 'active' : ''}}">
                <a href="{{$url}}?page=1" class="page-link">1</a>
            </li>
            @if ($curPage > 4)
            <li class="page-item">
                <a href="{{$url}}?page={{$curPage - 3}}" class="page-link">…</a>
            </li>
            @endif
            @if ($curPage < 5)
                @for($page = 2; $page < 8; $page ++) 
                    <li class="page-item {{$page == $curPage ? 'active' : ''}}">
                        <a href="{{$url}}?page={{$page}}" class="page-link">{{$page}}</a>
                    </li>
                @endfor
            @elseif ($totalPages - $curPage > 4)
                <li class="page-item">
                    <a href="{{$url}}?page={{$curPage - 2}}" class="page-link">{{$curPage - 2}}</a>
                </li>
                <li class="page-item">
                    <a href="{{$url}}?page={{$curPage - 1}}" class="page-link">{{$curPage - 1}}</a>
                </li>
                <li class="page-item active">
                    <a href="{{$url}}?page={{$curPage}}" class="page-link">{{$curPage}}</a>
                </li>
                <li class="page-item">
                    <a href="{{$url}}?page={{$curPage + 1}}" class="page-link">{{$curPage + 1}}</a>
                </li>
                <li class="page-item">
                    <a href="{{$url}}?page={{$curPage + 2}}" class="page-link">{{$curPage + 2}}</a>
                </li>
            @else
                @for($page = $totalPages - 6; $page < $totalPages; $page ++) 
                    <li class="page-item {{$page == $curPage ? 'active' : ''}}">
                        <a href="{{$url}}?page={{$page}}" class="page-link">{{$page}}</a>
                    </li>
                @endfor
            @endif
            @if ($totalPages - $curPage > 4)
            <li class="page-item">
                <a href="{{$url}}?page={{$curPage + 3}}" class="page-link">…</a>
            </li>
            @endif
            <li class="page-item {{$totalPages == $curPage ? 'active' : ''}}">
                <a href="{{$url}}?page={{$totalPages}}" class="page-link">{{$totalPages}}</a>
            </li>
        @endif
        <li class="page-item {{$curPage == $totalPages ? 'disabled' : ''}}">
            <a href="{{$url}}?page={{$curPage + 1}}" class="page-link">></a>
        </li>
    </ul>
    <div class="d-flex align-items-center gap-1">
        <input class="form-control mx-1" id="to-page" style="width: 70px" type="number" min="1" max="{{$totalPages}}" name="curPage" value="{{$curPage}}" placeholder="ページ">
        <span class="d-inline-block text-nowrap">に移動</span>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('select#select-per-page').on('change', function(e) {
            location.href = "{{$url}}?perPage=" + e.currentTarget.value;
        });

        $('input#to-page').on('keydown', function(e) {
            if (e.keyCode != 13) return;

            e.preventDefault();

            if (e.currentTarget.value > {{$totalPages}}) {
                e.currentTarget.value = {{$totalPages}};
            } else if (e.currentTarget.value < 0) {
                e.currentTarget.value = 1;
            }

            location.href = "{{$url}}?page=" + e.currentTarget.value;
        });
    });
</script>