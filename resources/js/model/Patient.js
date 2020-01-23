
export default class Patient {
    constructor(name = '' , address = '' ,
                age = '', tn='', gender='',
                isReport= false,lipid_flag = false,
                serology_flag = false) {

        this.name = name;
        this.address = address;
        this.age = age;
        this.tn = tn;
        this.gender= gender;
        this.isReport = isReport;
        this.lipid_flag = lipid_flag;
        this.serology_flag = serology_flag;
    }
}
