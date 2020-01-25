export default class BiochemistryLft {
    constructor(
        bilirubin_total = '',
        bilirubin_direct = '',
        sgpt_alt = '',
        sgpt_ast = '',
        alkaline_phosphatase = '',
        patient_id = '',
    ) {
        this.bilirubin_total = bilirubin_total;
        this.bilirubin_direct = bilirubin_direct;
        this.sgpt_alt = sgpt_alt;
        this.sgpt_ast = sgpt_ast;
        this.alkaline_phosphatase = alkaline_phosphatase;
        this.patient_id = patient_id;
    }
}
