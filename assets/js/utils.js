function get_long_date(date)
{
    let dateToFormat = dayjs(date);
    let longDate = dateToFormat.locale('id').format('D MMMM YYYY');
    return longDate;
}
