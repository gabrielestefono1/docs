import estilo from "./ProjectsTitle.module.scss";

interface ProjectsTitleProps {
    text: string;
}

export default function ProjectsTitle({ text }: Readonly<ProjectsTitleProps>) {
    return (
        <div className={estilo.title}>
            <p>{text}</p>
        </div>
    );
}
