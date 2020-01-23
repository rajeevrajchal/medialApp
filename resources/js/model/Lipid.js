
export default class Lipid {
    constructor(totalcholesterol = '' , triglyceride = '' ,
                hdl = '', ldl='', vldl='', calcium='',
                vitaminD='',vitaminB12='',uric='',
                patient_id='', lipid_flag = false) {
        this.totalcholesterol = totalcholesterol;
        this.triglyceride = triglyceride;
        this.hdl = hdl;
        this.ldl = ldl;
        this.vldl= vldl;
        this.calcium= calcium;
        this.vitaminD= vitaminD;
        this.vitaminB12= vitaminB12;
        this.uric= uric;
        this.patient_id= patient_id;
        this.lipid_flag = lipid_flag;

    }
}
