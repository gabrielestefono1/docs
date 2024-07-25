import FaqQuestion from "./FaqQuestion";
import estilo from "./FaqQuestions.module.scss";

export default function FaqQuestions() {
    return (
        <div className={estilo.questions}>
            <FaqQuestion content="Texto" title="Título"/>
            <FaqQuestion content="Texto" title="Título"/>
            <FaqQuestion content="Texto" title="Título"/>
            <FaqQuestion content="Texto" title="Título"/>
            <FaqQuestion content="Texto" title="Título"/>
        </div>
    );
}
