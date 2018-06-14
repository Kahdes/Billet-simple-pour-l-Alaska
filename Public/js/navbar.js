var Navbar = {
	url: location.href,
	homeElt: document.getElementById('accueil'),
	billListElt: document.getElementById('billList'),
	actionRegex: /index\.php\?action=/,
	listRegex: /billList/,

	activeLink() {
		if (this.actionRegex.test(this.url)) {
			if (this.listRegex.test(this.url)) {
				this.billListElt.setAttribute("class", "active");
			}			
		} else {
			this.homeElt.setAttribute("class", "active");
		}
	}
}

Navbar.activeLink();