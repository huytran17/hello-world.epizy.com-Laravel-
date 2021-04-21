const LIMIT_COMMENTS = 5,
    LIMIT_REPLIES = 3;

class Comment {
    constructor() {
        this.cmts = $('.comment-list > li');
    }

    limitParentComment() {
        if (this.cmts.length > LIMIT_COMMENTS) {
            for (var i = LIMIT_COMMENTS; i < this.cmts.length; i++) {
                $(this.cmts[i]).addClass('d-none');
            }
            $('.comment-list').append(this.createReadMoreLink('par'));
        }
    }

    limitReplyComment() {
    	var _this = this;

        (this.cmts).each(function(index, el) {
            var reps = $(el).find('.children > li');

            if (reps.length > LIMIT_REPLIES) {
                for (var i = LIMIT_REPLIES; i < reps.length; i++) {
                    $(reps[i]).addClass('d-none');
                }
                $(el).find('.children').append(_this.createReadMoreLink('rep'));
            }
        });
    }

    showMoreParent() {
        for (var i = LIMIT_COMMENTS; i < this.cmts.length; i++) {
            $(this.cmts[i]).removeClass('d-none');
        }
    }

    showMoreReply(rep_el) {
    	var reps = rep_el.closest('.children').find('.comment');

        for (var i = LIMIT_REPLIES; i < reps.length; i++) {
            $(reps[i]).removeClass('d-none');
        }
    }

    createReadMoreLink(type) {
        return $(`<li class="comment readmore-${type}"><a href="">Xem thêm</a></li>`);
    }
}

var cmt = new Comment;

(function() {
    cmt.limitParentComment();
    cmt.limitReplyComment();
})();

$('.comment-list .reply').click(function(event) {
    $(this).closest('p').next('div').find('form').toggleClass('d-none');
});

$('.comment-form-wrap form').submit(function(event) {
	$(this).find('input[type=submit]').attr('disabled', 'disabled');
});

$('.comment-body form').submit(function(event) {
	$(this).find('input[type=submit]').attr('disabled', 'disabled');
});

$(document).on('click', '.readmore-par', function(event) {
    event.preventDefault();
    cmt.showMoreParent();
    $(this).remove();
});

$(document).on('click', '.readmore-rep', function(event) {
    event.preventDefault();
    cmt.showMoreReply($(this));
    $(this).remove();
});
