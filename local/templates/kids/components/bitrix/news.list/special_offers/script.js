function NewsList(params) {
	this.areaId = params.areaId;
	this.navNum = params.navNum;
	
	$(this.init.bind(this));
}

NewsList.prototype = {
	init: function() {
		this.items = $("#" + this.areaId + "_items");
		this.nav = $("#" + this.areaId + "_nav");
		
		BX.addCustomEvent(window, "OnLoadMore", this.onLoadMore.bind(this));
	},
	
	onLoadMore: function(navNum, url) {
		if(navNum === this.navNum) {
			this.ajaxLoad(url, true);
		}
	},
	
	ajaxLoad: function(url, bAppendItems) {
		if(!!this.loading) {
			return;
		}
		
		this.loading = true;
		// TODO: показать индикатор загрузки?
		
		$.ajax({
			url: url,
			data: {
				action: "ajaxLoad",
			},
			dataType: "json",
			method: "POST",
			context: this,
			success: function(json) {
				if(!!json) {
					if(!!bAppendItems) {
						if(!!json.items) {
							this.items.append(json.items);
						}
					} else {
						// TODO: промотать к началу списка?
						
						if(!!json.items) {
							this.items.html(json.items);
						} else {
							this.items.html("");
						}
					}
					
					if(!!json.nav) {
						this.nav.html(json.nav);
					} else {
						this.nav.html("");
					}
				}
			},
			
			complete: function() {
				// TODO: скрыть индикатор загрузки?
				this.loading = false;
			},
		});
	},
};