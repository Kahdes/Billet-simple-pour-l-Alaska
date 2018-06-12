var Bill = {
    billIndex: 1,    
    prevBill: document.getElementById('prev'),
    nextBill: document.getElementById('next'),
    currentBill: document.getElementById('current-bill'),
    bills: document.getElementsByClassName("billList-bill"),
    
    //1 : FONCTION BILLET PRECENDANT
    moinsBill() {
        Bill.showBill(Bill.billIndex -= 1)
    },
    
    //2 : FONCTION BILLET SUIVANT
    plusBill() {
        Bill.showBill(Bill.billIndex += 1);
    },
    
    //3 : FONCTION SWITCH DE BILLET
    showBill(n) {
        if (n > Bill.bills.length) {
            Bill.billIndex = 1;
        }
        if (n < 1) {
            Bill.billIndex = Bill.bills.length;
        }
        for (var i = 0; i < Bill.bills.length; i++) {
            Bill.bills[i].style.display = "none";
        }

        Bill.bills[Bill.billIndex - 1].style.display = "block";
        Bill.currentBill.textContent = Bill.billIndex;
    },
    
    //4 : FONCTION EVENTS CONTROLE BOUTONS
    eventBill() {
        this.prevBill.addEventListener('click', Bill.moinsBill);
        this.nextBill.addEventListener('click', Bill.plusBill);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight') {
                Bill.plusBill();
            } else if (e.key === 'ArrowLeft') {
                Bill.moinsBill();
            }
        });
    }
};

//INITIALISATION SLIDER
Bill.showBill(Bill.billIndex);
Bill.eventBill();