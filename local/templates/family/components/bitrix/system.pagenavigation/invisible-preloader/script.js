function InvisiblePreloader(params) {
	this.areaId = params.areaId;
	this.navNum = params.navNum;
	this.nextPageUrl = params.nextPageUrl;
	
	$(this.init.bind(this));
}

InvisiblePreloader.prototype = {
	init: function() {
		let observer = new IntersectionObserver(this.observerCallback.bind(this), {rootMargin: "100px"});
		observer.observe(document.getElementById(this.areaId));
	},
	
	observerCallback: function(entries, observer) {
		if(entries[0].isIntersecting) {
			observer.disconnect();
			BX.onCustomEvent(window, "OnLoadMore", [this.navNum, this.nextPageUrl]);
		}
	},
};