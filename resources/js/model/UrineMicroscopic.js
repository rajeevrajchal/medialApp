export default class UrineMicroscopic {
    constructor(
        cast = '',
        crystal = '',
        puscells = '',
        sec = '',
        erythrocytes = '',
        yeast = '',
        calciumxalate = '',
        others = '',
        patient_id = ''
    ) {
        this.cast = cast;
        this.crystal = crystal;
        this.puscells = puscells;
        this.sec = sec;
        this.erythrocytes = erythrocytes;
        this.yeast = yeast;
        this.calciumxalate = calciumxalate;
        this.others = others;
        this.patient_id = patient_id;
    }
}
