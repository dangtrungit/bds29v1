<script>
    $(document).ready(function () {
        @if (auth() -> user())
            function getAllFeaturedAjax() {
                return $.ajax({
                    url: '/featured',
                    type: 'GET',
                })
            }
        $(document).on('click', '.remove-featured-btn', function (e) {
            e.stopPropagation();
            e.preventDefault();
            // Hàm được khai báo trong featured script component
            var elem = $(this);
            removeFeaturedAjax($(this).data('featured-id'))
                .done(function (data) {
                    renderList();
                })
                ;
        });
        function renderList() {
            getAllFeaturedAjax().done(function (data) {
                $('.featured-body').html('');
                if (!$.isEmptyObject(data)) {
                    $('.featured-show-all').show()
                    data.forEach(function (item) {
                        var component = createFeaturedBox(item);
                        $('.featured-body').append(component);
                    })
                } else {
                    $('.featured-body').append(`
                        <div class="text-center">
                            <img src="/images/icons/empty-state.svg" class="my-5" style="width: 70%" alt="">
                            <p class="font-11 spacing-1">Bấm <i class="mx-1 font-13 far fa-heart"></i> để lưu tin <br>Và xem lại tin ở đây</p>
                        </div>
                    `);
                    $('.featured-show-all').hide()
                }
            });
        }
        function createFeaturedBox(item) {
            return `
            <div class="border-bottom featured-item-wraper py-2 px-3">
                <a href="${item.link}" class="d-flex featured-item align-items-center">
                    <div class="img-wraper flex-fixed-20" style="height:50px">
                        <img src="${item.thumb}" class="rounded" alt="" srcset="">
                    </div>
                    <div class="px-2 position-relative">
                        <div class="main-text text-truncate font-9 font-weight-500" style="max-width: 280px;">${item.title}</div>
                        <div class="mt-2 secondary-text font-8">Đăng 1 ngay trước</div>
                        <button type="button" data-featured-id="${item.id}" class="btn bg-white remove-featured-btn position-absolute"><i class="fal fa-times"></i></button>
                    </div>
                </a>
            </div>
            `
        }
        function addFeaturedAjax(postId) {
            return $.ajax({
                url: '/featured/add',
                data: {
                    post_id: postId,
                },
                type: 'POST',
            })
        }

        function checkHeart(heart) {
            heart.html(`<i class="fas fa-heart font-12 text-info"></i>`);
        }

        function uncheckHeart(heart) {
            heart.html(`<i class="far fa-heart font-12 text-info"></i>`);
        }

        function removeFeaturedAjax(postId) {
            return $.ajax({
                url: '/featured/remove',
                data: {
                    post_id: postId,
                },
                type: 'POST',
            })
        }

        $(document).on('click', '.like-heart.unchecked', function () {
            var postId = $(this).data('post-id');
            var element = $(this);
            addFeaturedAjax(postId)
            .done(function (data) {
                element.removeClass('unchecked');
                element.addClass('checked');
                checkHeart(element);
                renderList();
            })
            .fail(function (error) {
                if (error.status == 401) {
                    swalAlert('Bạn vui lòng đăng nhập để thực hiện lưu tin', 'error')
                }
            });
        })
        $(document).on('click', '.like-heart.checked', function () {
            var postId = $(this).data('post-id');
            var element = $(this);
            removeFeaturedAjax(postId)
            .done(function (data) {
                element.removeClass('checked');
                element.addClass('unchecked');
                uncheckHeart(element);
                renderList();
            })
            .fail(function (error) {
                if (error.status == 401) {
                    swalAlert('Bạn vui lòng đăng nhập để thực hiện bỏ lưu tin', 'error')
                }
            });
        })
        @else
        $(document).on('click', '.like-heart.unchecked', function () {
            swalAlert('Bạn vui lòng đăng nhập để thực hiện bỏ lưu tin', 'error')
        })
        @endif
    })
</script>
