import React, { useState, useRef, useEffect } from "react";
import close from "./close.png";
import styles from "./FaqQuestion.module.scss";

const AccordionItem = ({ title, content }: any) => {
    const [isOpen, setIsOpen] = useState<boolean>(false);
    const [maxHeight, setMaxHeight] = useState("0px");
    const panelRef = useRef<HTMLDivElement>(null);

    const toggleAccordion = () => {
        setIsOpen(!isOpen);
    };

    useEffect(() => {
        if (!panelRef) {
            return;
        }
        if (!panelRef.current) {
            return;
        }
        setMaxHeight(isOpen ? `${panelRef.current.scrollHeight}px` : "0px");
    }, [isOpen]);

    return (
        <div className={styles.faqAccordion}>
            <button className={`${styles.accordion} ${isOpen ? styles.accordionAberto : styles.accordionFechado}`}
                onClick={toggleAccordion}
            >
                {title}
                <div className={isOpen ? styles.aberto : styles.fechado}>
                    <img src={close} alt="Fechar" />
                </div>
            </button>
            <div
                ref={panelRef}
                className={`${styles.panel} ${isOpen ? styles.open : ""}`}
                style={{ maxHeight: maxHeight }}
            >
                <div className={styles.panelContent}>{content}</div>
            </div>
        </div>
    );
};

export default AccordionItem;
