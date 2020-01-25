
export default class Patient {
    constructor(name = '' ,
                address = '' ,
                age = '',
                tn='',
                gender='',
                isReport= false,
                lipid_flag = false,
                serology_flag = false,
                urine_flag=false,
                hematology_flag = false,
                biochemistry_flag = false
    ) {

        this.name = name;
        this.address = address;
        this.age = age;
        this.tn = tn;
        this.gender= gender;
        this.isReport = isReport;
        this.lipid_flag = lipid_flag;
        this.serology_flag = serology_flag;
        this.urine_flag = urine_flag;
        this.hematology_flag = hematology_flag;
        this.biochemistry_flag = biochemistry_flag;
    }
}
