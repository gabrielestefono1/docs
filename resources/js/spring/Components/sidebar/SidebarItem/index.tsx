import styles from "./SidebarItem.module.scss";

interface SidebarItemProps {
    titulo: string;
}

export default function SidebarItem({ titulo }: Readonly<SidebarItemProps>) {
    return <button className={styles.sidebarItem}>{titulo}</button>;
}
