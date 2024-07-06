import SidebarItem from "../SidebarItem";
import styles from "./SidebarGroup.module.scss";

export default function SidebarGroup({
    active = false,
}: Readonly<{ active?: boolean }>) {
    return (
        <>
            <button
                className={`${styles.sidebarGroup} ${
                    active ? styles.active : ""
                }`}
            >
                <div></div>
                <p>Core Technologies</p>
            </button>
            {active && (
                <div className={styles.sidebarGroupItems}>
                    <SidebarItem />
                </div>
            )}
        </>
    );
}
