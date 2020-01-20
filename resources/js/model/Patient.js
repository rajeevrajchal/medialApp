
export default class Patient {
    constructor(name = '' , address = '' , age = '', tn='', gender='', isReport= false) {
        this.name = name;
        this.address = address;
        this.age = age;
        this.tn = tn;
        this.gender= gender;
        this.isReport = isReport;
    }
}
