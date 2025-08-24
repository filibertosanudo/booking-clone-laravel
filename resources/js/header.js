export default function headerDropdowns() {
    return {
        currencyOpen: false,
        languageOpen: false,
        selectedCurrency: localStorage.getItem('selectedCurrency') || 'MXN',
        selectedLanguage: localStorage.getItem('selectedLanguage') || 'ES',

        toggleCurrency() {
            this.currencyOpen = !this.currencyOpen;
            if (this.currencyOpen) this.languageOpen = false;
        },
        selectCurrency(currency) {
            this.selectedCurrency = currency;
            localStorage.setItem('selectedCurrency', currency);
            this.currencyOpen = false;
        },
        toggleLanguage() {
            this.languageOpen = !this.languageOpen;
            if (this.languageOpen) this.currencyOpen = false;
        },
        selectLanguage(language) {
            this.selectedLanguage = language;
            localStorage.setItem('selectedLanguage', language);
            this.languageOpen = false;
        }
    }
}
